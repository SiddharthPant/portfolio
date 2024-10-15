<?php

namespace App\Models;

use App\Models\Concerns\ConvertsMarkdownToHtml;
use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use ConvertsMarkdownToHtml;

    /** @use HasFactory<CommentFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'body',
    ];

    /**
     * @return BelongsTo<User, Comment>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Post, Comment>
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
