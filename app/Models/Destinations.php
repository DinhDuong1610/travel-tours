<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Destinations extends Model
{
    use SoftDeletes;

    function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'destinations_tag', 'destinations_id', 'tag_id');
    }

    public function checkouts() {
        return $this->hasMany(Checkout::class);
    }

    public function deleteImage() {
        Storage::delele($this->image);
    }

    public function hasTag($tagId) {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}
