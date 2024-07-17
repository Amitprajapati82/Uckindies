<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';


    public function approvals(): MorphMany
    {
        return $this->morphMany(Approval::class, 'approvable');
    }
    
}