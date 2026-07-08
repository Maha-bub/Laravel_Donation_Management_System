<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Campaigns;


class Donations extends Model
{
    protected $fillable = ['name', 'campaign_id', 'amount'];

    public function campaigns()
    {
        return $this->belongsTo(CampaignList::class, 'campaign_id');
    }
}
