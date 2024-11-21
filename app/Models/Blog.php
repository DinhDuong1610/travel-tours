<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use SoftDeletes;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function deleteImage() {
        Storage::delete($this->image);
    }
}
