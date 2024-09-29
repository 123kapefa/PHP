<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Comment extends Model
{
    use HasFactory
        , AsSource
        , Filterable
        , Attachable
        ;

    protected $fillable = [
        'user_id',
        'post_id',
        'text',
        'likes_count',
        'dislikes_count',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
