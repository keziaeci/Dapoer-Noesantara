<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = ['id'];

    function post() : BelongsTo {
        return $this->belongsTo(Post::class);
    }

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
