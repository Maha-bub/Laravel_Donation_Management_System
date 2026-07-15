<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CampaignList;
use App\Models\Donations;
use App\Models\DonorList;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // Show the latest active campaigns on the homepage "Donation Causes" section.
        $campaigns = CampaignList::with('category')
            ->withSum('donations', 'amount')
            ->where('status', CampaignList::STATUS_ACTIVE)
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.pages.home', compact('campaigns'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function schoolBags()
    {
        return view('frontend.pages.projects.school-bags');
    }

    public function buildMasjid()
    {
        return view('frontend.pages.projects.build-masjid');
    }

    public function donateHouse()
    {
        return view('frontend.pages.projects.donate-house');
    }

    public function donateQuran()
    {
        return view('frontend.pages.projects.donate-quran');
    }

    public function emergencyAid()
    {
        return view('frontend.pages.projects.emergency-aid');
    }

    public function feedDaily()
    {
        return view('frontend.pages.projects.feed-daily');
    }

    public function tubewell()
    {
        return view('frontend.pages.projects.tubewell');
    }

    public function healingBangladesh()
    {
        return view('frontend.pages.projects.healing-bangladesh');
    }

    public function incomeGenerating()
    {
        return view('frontend.pages.projects.income-generating');
    }

    public function sponsoredYateem()
    {
        return view('frontend.pages.projects.sponsored-yateem');
    }

    /**
     * Full list of all active campaigns, shown on the public "Campaigns" page.
     */
    public function campaigns()
    {
        $campaigns = CampaignList::with('category')
            ->withSum('donations', 'amount')
            ->where('status', CampaignList::STATUS_ACTIVE)
            ->latest()
            ->get();

        return view('frontend.pages.campaigns.index', compact('campaigns'));
    }

    /**
     * Single campaign detail page, with a quick-donate call to action.
     */
    public function campaignShow(CampaignList $campaign)
    {
        $campaign->loadSum('donations', 'amount');

        $relatedCampaigns = CampaignList::where('status', CampaignList::STATUS_ACTIVE)
            ->where('id', '!=', $campaign->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.pages.campaigns.show', compact('campaign', 'relatedCampaigns'));
    }

    /**
     * The public donation page with the "Complete Your Donation" form.
     */
    public function donation(Request $request)
    {
        $campaigns = CampaignList::where('status', CampaignList::STATUS_ACTIVE)->latest()->get();
        $selectedCampaignId = $request->query('campaign_id');

        return view('frontend.pages.donation', compact('campaigns', 'selectedCampaignId'));
    }

    /**
     * Handle the public donation form submission and store it in the same
     * `donations` table the admin dashboard reads from, so every donation
     * made from the website shows up instantly for the admin.
     */
    public function storeDonation(Request $request)
    {
        // A visitor either picks one of the preset amount buttons ("amount")
        // or types their own value in the custom amount box ("custom_amount").
        // Whichever one is filled in wins.
        if ($request->filled('custom_amount')) {
            $request->merge(['amount' => $request->custom_amount]);
        }

        $request->validate([
            'campaign_id' => 'required|exists:campaign_lists,id',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:50',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|max:100',
        ], [
            'amount.required' => 'Please choose a donation amount or enter a custom amount.',
            'email.required' => 'Please enter your email so we can send your donation receipt.',
        ]);

        $donation = Donations::create([
            'name' => $request->name,
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);

        // Raised Amount for the campaign is derived automatically from its
        // donations, and its status flips to Completed once the goal is hit.
        $donation->campaign?->refreshStatus();


        if (!$request->boolean('is_anonymous')) {
            $donor = DonorList::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'phone' => $request->phone ?: 'N/A',
                    'image' => 'default.png',
                    'total' => 0,
                ]
            );

            $donor->donations()->create([
                'amount' => $request->amount,
                'donation_date' => now()->toDateString(),
                'note' => 'Online donation — ' . ($donation->campaign->name ?? 'General') . ' (' . $request->payment_method . ')',
            ]);

            $donor->update(['total' => $donor->donations()->sum('amount')]);
        }

        return redirect()->route('donation')->with('success', 'Thank you! Your donation has been received.');
    }
}
