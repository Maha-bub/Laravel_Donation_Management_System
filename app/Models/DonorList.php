<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonorList extends Model
{
    protected $fillable = ['name','image','email','phone','total'];
}
