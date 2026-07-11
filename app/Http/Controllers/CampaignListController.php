<?php

namespace App\Http\Controllers;

use App\Models\CampaignList;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CampaignListController extends Controller
{
    /**
     * Display a listing of the resource — with search, category/status/date
     * filters, sorting and pagination, plus the campaign dashboard stats.
     */
    public function index(Request $request)
    {
        $showTrashed = $request->boolean('trashed');

        $query = $showTrashed
            ? CampaignList::onlyTrashed()
            : CampaignList::query();

        $query->with('category')
            ->withSum('donations', 'amount')
            ->withCount('donations')
            ->searchTitle($request->input('search'))
            ->ofCategory($request->input('category_id'))
            ->ofStatus($request->input('status'))
            ->endingBetween($request->input('end_from'), $request->input('end_to'));

        $sortable = ['goal_amount', 'donations_sum_amount', 'end_date', 'created_at', 'name'];
        $sortBy = in_array($request->input('sort_by'), $sortable, true) ? $request->input('sort_by') : 'created_at';
        $sortDir = $request->input('sort_dir') === 'asc' ? 'asc' : 'desc';

        $campaigns = $query->orderBy($sortBy, $sortDir)
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        // Dashboard statistics for the campaign module.
        $stats = [
            'total' => CampaignList::count(),
            'active' => CampaignList::ofStatus(CampaignList::STATUS_ACTIVE)->count(),
            'completed' => CampaignList::ofStatus(CampaignList::STATUS_COMPLETED)->count(),
            'total_goal' => (float) CampaignList::sum('goal_amount'),
            'total_raised' => (float) \App\Models\Donations::sum('amount'),
        ];

        $topCampaign = CampaignList::withSum('donations', 'amount')
            ->orderByDesc('donations_sum_amount')
            ->first();

        return view('admin.campaigns.index', [
            'items' => $campaigns,
            'categories' => $categories,
            'statuses' => CampaignList::STATUSES,
            'stats' => $stats,
            'topCampaign' => $topCampaign,
            'filters' => $request->only(['search', 'category_id', 'status', 'end_from', 'end_to', 'sort_by', 'sort_dir']),
            'showTrashed' => $showTrashed,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $statuses = CampaignList::STATUSES;

        return view('admin.campaigns.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateCampaign($request, true);

        $campaign = new CampaignList();
        $campaign->fill($validated);
        $campaign->created_by = auth()->id();

        if ($request->hasFile('photo')) {
            $campaign->image = $this->storePhoto($request);
        }

        $campaign->save();

        return redirect()->route('admin.campaignlist.index')->with('success', 'Campaign created successfully!!');
    }

    /**
     * Display the specified resource — campaign details page with donation
     * count, recent donations and live progress.
     */
    public function show(CampaignList $campaignlist)
    {
        $campaignlist->loadSum('donations', 'amount');
        $campaignlist->loadCount('donations');
        $campaignlist->load('category', 'creator');

        // Keep the status flow (Active -> Completed) accurate whenever the
        // details page is opened.
        $campaignlist->refreshStatus();

        $recentDonations = $campaignlist->donations()->latest()->take(10)->get();

        return view('admin.campaigns.show', [
            'campaign' => $campaignlist,
            'recentDonations' => $recentDonations,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignList $campaignlist)
    {
        $categories = Category::orderBy('name')->get();
        $statuses = CampaignList::STATUSES;

        return view('admin.campaigns.edit', compact('campaignlist', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignList $campaignlist)
    {
        $validated = $this->validateCampaign($request, false);

        $campaignlist->fill($validated);

        if ($request->hasFile('photo')) {
            $oldPath = public_path('images/' . $campaignlist->image);
            if ($campaignlist->image && file_exists($oldPath)) {
                @unlink($oldPath);
            }

            $campaignlist->image = $this->storePhoto($request);
        }

        $campaignlist->save();

        return redirect()->route('admin.campaignlist.index')->with('success', 'Campaign updated successfully!!');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(CampaignList $campaignlist)
    {
        $campaignlist->delete();

        return redirect()->route('admin.campaignlist.index')->with('success', 'Campaign moved to trash.');
    }

    /**
     * Restore a soft-deleted campaign.
     */
    public function restore($id)
    {
        $campaign = CampaignList::onlyTrashed()->findOrFail($id);
        $campaign->restore();

        return back()->with('success', 'Campaign restored successfully!!');
    }

    /**
     * Permanently delete a soft-deleted campaign (and its image).
     */
    public function forceDelete($id)
    {
        $campaign = CampaignList::onlyTrashed()->findOrFail($id);

        $path = public_path('images/' . $campaign->image);
        if ($campaign->image && file_exists($path)) {
            @unlink($path);
        }

        $campaign->forceDelete();

        return back()->with('success', 'Campaign permanently deleted.');
    }

    // ----------------------------------------------------------------
    // Helpers
    // ----------------------------------------------------------------

    private function validateCampaign(Request $request, bool $isCreate): array
    {
        return $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:500',
            'goal_amount' => 'required|numeric|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => ['required', Rule::in(CampaignList::STATUSES)],
            'photo' => ($isCreate ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    }

    private function storePhoto(Request $request): string
    {
        $randomNum = rand(0, 999999);
        $photoExt = $request->photo->extension();
        $photoName = $randomNum . time() . '.' . $photoExt;
        $request->photo->move(public_path('images'), $photoName);

        return $photoName;
    }
}
