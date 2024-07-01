<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $timestamps = true;
    public $table='contact_us';
    protected $primaryKey = 'id';
}
