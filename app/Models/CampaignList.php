<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignList extends Model
{
   protected $fillable = ['image', 'name', 'description', 'category_id', 'goal_amount', 'status'];

   public function category()
   {
      return $this->belongsTo(Category::class);
   }
}
