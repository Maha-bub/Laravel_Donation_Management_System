<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CampaignList;
use App\Models\Donations;
use App\Models\DonorList;
use App\Services\BkashService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
     * Handle the public donation form submission.
     *
     * - Cash/Nagad/Card: recorded immediately (same as before).
     * - bKash: instead of saving right away, we redirect the donor to
     *   bKash's sandbox checkout page. The actual donation + donor-list
     *   records are only written once bKash confirms the payment in
     *   bkashCallback() below — so no "fake" successful donations get
     *   created if the donor cancels or the payment fails.
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
            'campaign_id' => [
                'required',
                Rule::exists('campaign_lists', 'id')->where('status', CampaignList::STATUS_ACTIVE),
            ],
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => [
                Rule::requiredIf(fn () => $request->payment_method === 'bKash'),
                'nullable',
                'regex:/^(?:\+?880|0)1[3-9]\d{8}$/',
            ],
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:bKash,Nagad,Visa/Master',
        ], [
            'campaign_id.required' => 'Please choose a campaign to donate to.',
            'campaign_id.exists' => 'That campaign is no longer accepting donations.',
            'amount.required' => 'Please choose a donation amount or enter a custom amount.',
            'email.required' => 'Please enter your email so we can send your donation receipt.',
            'phone.required' => 'A mobile number is required for bKash payments.',
            'phone.regex' => 'Please enter a valid Bangladeshi mobile number, e.g. 01712345678.',
        ]);

        if ($request->payment_method === 'bKash') {
            return $this->initiateBkashPayment($request);
        }

        $this->recordDonation(
            campaignId: $request->campaign_id,
            name: $request->name,
            email: $request->email,
            phone: $request->phone,
            amount: (float) $request->amount,
            paymentMethod: $request->payment_method,
            isAnonymous: $request->boolean('is_anonymous'),
        );

        return redirect()->route('donation')->with('success', 'Thank you! Your donation has been received.');
    }

    /**
     * Writes a confirmed donation to the `donations` table and — unless the
     * donor asked to stay anonymous — finds/creates their Donor List entry
     * and logs the donation in that donor's history, keeping their running
     * total in sync. Used by both the direct-save flow (Nagad/Card) and the
     * bKash callback, so every payment method ends up in the exact same
     * place for the admin.
     */
    private function recordDonation(
        int $campaignId,
        string $name,
        string $email,
        ?string $phone,
        float $amount,
        string $paymentMethod,
        bool $isAnonymous,
        ?string $note = null,
    ): Donations {
        $donation = Donations::create([
            'name' => $name,
            'campaign_id' => $campaignId,
            'amount' => $amount,
            'payment_method' => $paymentMethod,
        ]);

        // Raised Amount for the campaign is derived automatically from its
        // donations, and its status flips to Completed once the goal is hit.
        $donation->campaign?->refreshStatus();

        if (!$isAnonymous) {
            $donor = DonorList::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'phone' => $phone ?: 'N/A',
                    'image' => 'default.png',
                    'total' => 0,
                ]
            );

            $donor->donations()->create([
                'amount' => $amount,
                'donation_date' => now()->toDateString(),
                'note' => $note ?? ('Online donation — ' . ($donation->campaign->name ?? 'General') . ' (' . $paymentMethod . ')'),
            ]);

            $donor->update(['total' => $donor->donations()->sum('amount')]);
        }

        return $donation;
    }

    /**
     * Step 1 of the bKash sandbox flow: open a payment session and send the
     * donor to bKash's hosted checkout page. We don't write anything to our
     * own tables yet — the donation details are stashed in the session,
     * keyed by bKash's paymentID, until the callback confirms it.
     */
    private function initiateBkashPayment(Request $request)
    {
        $bkash = new BkashService();

        $invoiceNumber = 'DON-' . now()->format('YmdHis') . '-' . random_int(100, 999);

        $payment = $bkash->createPayment(
            amount: (float) $request->amount,
            invoiceNumber: $invoiceNumber,
            payerReference: $request->phone,
            callbackUrl: route('donation.bkash.callback'),
        );

        if (!$payment) {
            return back()->withInput()->with(
                'error',
                'Could not connect to the bKash sandbox right now. Please try again in a moment, or choose a different payment method.'
            );
        }

        session([
            'pending_bkash_donation.' . $payment['paymentID'] => [
                'campaign_id' => (int) $request->campaign_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'amount' => (float) $request->amount,
                'is_anonymous' => $request->boolean('is_anonymous'),
                'invoice' => $invoiceNumber,
            ],
        ]);

        return redirect()->away($payment['bkashURL']);
    }

    /**
     * Step 2 of the bKash sandbox flow: bKash redirects the donor's browser
     * back here with `paymentID` and `status` in the query string. We
     * execute (confirm) the payment server-side before trusting it, then
     * write the donation + donor-list records only on real success.
     */
    public function bkashCallback(Request $request)
    {
        $paymentId = $request->query('paymentID');
        $status = $request->query('status');
        $sessionKey = 'pending_bkash_donation.' . $paymentId;
        $pending = session($sessionKey);

        if (!$pending) {
            return redirect()->route('donation')
                ->with('error', 'We could not find this bKash payment session. If money was deducted, please contact us with your Transaction ID.');
        }

        if ($status !== 'success') {
            session()->forget($sessionKey);

            return redirect()->route('donation')
                ->with('error', 'The bKash payment was not completed (' . e($status) . '). Please try again.');
        }

        $bkash = new BkashService();
        $result = $bkash->executePayment($paymentId);

        if (!$result || ($result['transactionStatus'] ?? null) !== 'Completed') {
            session()->forget($sessionKey);

            return redirect()->route('donation')
                ->with('error', 'bKash could not confirm this payment. Please try again.');
        }

        $trxId = $result['trxID'] ?? $paymentId;

        $this->recordDonation(
            campaignId: $pending['campaign_id'],
            name: $pending['name'],
            email: $pending['email'],
            phone: $pending['phone'],
            amount: $pending['amount'],
            paymentMethod: 'bKash',
            isAnonymous: $pending['is_anonymous'],
            note: 'Online donation via bKash (TrxID: ' . $trxId . ', Invoice: ' . $pending['invoice'] . ')',
        );

        session()->forget($sessionKey);

        return redirect()->route('donation')
            ->with('success', 'Thank you! Your bKash payment was successful. Transaction ID: ' . $trxId);
    }
}
