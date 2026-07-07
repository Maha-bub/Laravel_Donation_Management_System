<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Campaigns;


class Donations extends Model
{
    protected $fillable = ['name', 'campaign', 'amount'];

    public function campaign()
    {
        return $this->hasMany(Campaigns::class);
    }
}
