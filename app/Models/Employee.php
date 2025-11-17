<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'position',
        'division',
        'photo_path',
        'phone',
        'email',
        'display_order',
    ];

    protected $casts = [
        'display_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getPhotoUrlAttribute()
    {
        if ($this->photo_path) {
            return asset('uploads/' . basename($this->photo_path));
        }
        return null;
    }
}

