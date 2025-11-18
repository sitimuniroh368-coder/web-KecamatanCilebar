<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'content',
        'tugas_fungsi',
        'sejarah',
        'visi',
        'misi',
    ];

    public static function getProfile()
    {
        return static::first() ?? new static(['id' => 1, 'content' => '']);
    }
}

