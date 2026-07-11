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
        $activeCampaigns = CampaignList::where('status', 0)->count();
        $inactiveCampaigns = CampaignList::where('status', 1)->count();
        $totalDonors = DonorList::count();

        return view('admin.dashboard', compact(
            'totalRaised',
            'totalCampaigns',
            'activeCampaigns',
            'inactiveCampaigns',
            'totalDonors'
        ));
    }
}
