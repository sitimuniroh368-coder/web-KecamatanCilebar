<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahInfo extends Model
{
    use HasFactory;

    protected $table = 'wilayah_info';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'content',
        'map_iframe',
    ];

    public static function getWilayah()
    {
        return static::first() ?? new static(['id' => 1, 'content' => '']);
    }
}

