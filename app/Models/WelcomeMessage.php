<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeMessage extends Model
{
    use HasFactory;

    protected $table = 'welcome_message';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id',
        'camat_name',
        'camat_photo',
        'message',
        'sekretaris_name',
        'sekretaris_photo',
    ];

    public function getCamatPhotoUrlAttribute()
    {
        if ($this->camat_photo) {
            return asset('uploads/' . basename($this->camat_photo));
        }
        return asset('img/camat-foto.jpeg');
    }

    public function getSekretarisPhotoUrlAttribute()
    {
        if ($this->sekretaris_photo) {
            return asset('uploads/' . basename($this->sekretaris_photo));
        }
        return null;
    }
}

