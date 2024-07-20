<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Banner extends Model
{
    use HasFactory;

    protected $table = 'uc_banners';
    protected $fillable = ['banner_image'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function approvals(): MorphMany
    {
        return $this->morphMany(Approval::class, 'approvable');
    }
}
