<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignList extends Model
{
   protected $fillable=['image','name','description','category','goal_amount','status'];
}
