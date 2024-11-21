<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function destinations() {
        return $this->hasMany(Destinations::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }
}
