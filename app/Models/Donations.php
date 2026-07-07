<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    protected $fillable = ['name', 'campaign', 'amount'];
}
