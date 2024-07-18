<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'uc_banners';
    protected $fillable = ['banner_image'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
