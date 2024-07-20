<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';

    protected $fillable = ['state_name', 'status', 'delete_status'];

    public function banners()
    {
        return $this->hasMany(Banner::class,'state_id');
    }

    public function aboutUs()
    {
        return $this->hasOne(About::class, 'state_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class,'state_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function ourTeam()
    {
        return $this->hasMany(OurTeam::class);
    }

    public function unitFranchises()
    {
        return $this->hasMany(Address::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    
}