<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Donations;

class CampaignList extends Model
{
   protected $fillable = ['image', 'name', 'description', 'category_id', 'goal_amount', 'status'];

   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function donations()
   {
      return $this->hasMany(Donations::class);
   }
}
