<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];
    // protected $fillable = [
    //     'id',
    //     'user_id',
    //     'image'
    // ];
}
