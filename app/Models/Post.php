<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $with = ['user','categories'];


    function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class, 'category_post' , 'post_id' , 'category_id');
    }

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }
}