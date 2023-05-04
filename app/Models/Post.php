<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'description',
        'status',
        'image',
        'highlight_post'
    ];

    public function categories(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
