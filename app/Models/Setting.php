<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'site_title',
        'address',
        'phone',
        'email',
        'whatsapp',
        'instagram',
        'facebook',
    ];

    public static function getSettings()
    {
        return static::first() ?? new static(['id' => 1]);
    }
}

