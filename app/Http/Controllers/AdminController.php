<?php

namespace App\Http\Controllers;

use App\Models\CampaignList;
use App\Models\Donations;
use App\Models\DonorList;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalRaised = Donations::sum('amount');
        $totalCampaigns = CampaignList::count();
        $activeCampaigns = CampaignList::where('status', CampaignList::STATUS_ACTIVE)->count();
        $completedCampaigns = CampaignList::where('status', CampaignList::STATUS_COMPLETED)->count();
        $inactiveCampaigns = CampaignList::where('status', CampaignList::STATUS_CLOSED)->count();
        $totalDonors = DonorList::count();

        return view('admin.dashboard', compact(
            'totalRaised',
            'totalCampaigns',
            'activeCampaigns',
            'completedCampaigns',
            'inactiveCampaigns',
            'totalDonors'
        ));
    }
}
