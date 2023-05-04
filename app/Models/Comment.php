<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'content',
        'parent_id',
        'status',
    ];

    public function posts(): BelongsTo {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
