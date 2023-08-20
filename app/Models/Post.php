<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $with = ['user','categories'];


    function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class, 'post_categories' , 'post_id' , 'category_id');
    }

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}