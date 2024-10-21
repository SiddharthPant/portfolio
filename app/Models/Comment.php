<?php

namespace App\Models;

use App\Models\Concerns\ConvertsMarkdownToHtml;
use App\Models\Concerns\HasSqid;
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

    use HasSqid;
    use SoftDeletes;

    const SQID_PREFIX = 'cmt_';

    protected $fillable = [
        'body',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Post, $this>
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
