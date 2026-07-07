<?php

namespace App\Models;
use App\Models\Donations;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    protected $fillable = ['campaign'];

    public function donations()
    {
        return $this->belongsTo(Donations::class);
    }
}
