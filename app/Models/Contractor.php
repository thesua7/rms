<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    public $fillable = ['name','phone_number'];
    public $timestamps = true;
}
