<?php

namespace App\Models;

use App\Mail\PostStored;
use App\Mail\PostCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    // protected static function booted()
    // {
    //     static::created(function ($post) {
    //         Mail::to('naingwinaung@gmail.com')->send(new PostStored($post));
    //     });
    // }
}
