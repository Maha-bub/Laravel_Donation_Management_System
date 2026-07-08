<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CampaignList;


class Donations extends Model
{
    protected $fillable = ['name', 'campaign_id', 'amount', 'payment_method'];

    public function campaign()
    {
        return $this->belongsTo(CampaignList::class, 'campaign_id');
    }
}
