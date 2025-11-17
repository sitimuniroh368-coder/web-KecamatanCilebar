<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'population',
        'area',
        'image',
        'contact_person',
        'contact_phone',
        'contact_email',
        'latitude',
        'longitude',
        'statistics',
        'head_name',
        'head_phone',
        'head_email',
        'village_office_phone',
        'village_office_email',
        'map_iframe',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'statistics' => 'json',
    ];
}
