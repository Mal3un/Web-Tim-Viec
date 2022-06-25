<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectLanguage extends Model
{
    public $table = 'Object_language';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'object_id',
        'language_id',
        'type',
    ];
}
