<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, HasUuids;

    function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class, 'post_category' , 'post_id' , 'category_id');
    }
}