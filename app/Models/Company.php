<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'email', 'logo', 'website', 'phone', 'address', 'city', 'state', 'zip', 'country', 'created_at', 'updated_at'];
}
