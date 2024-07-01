<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchises extends Model
{
    use HasFactory;
    
    public $table='franchises';
    protected $primaryKey = 'id';
}
