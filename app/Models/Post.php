<?php

namespace App\Models;

use App\Models\Concerns\ConvertsMarkdownToHtml;
use App\Support\PostStatusEnum;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use ConvertsMarkdownToHtml;

    /** @use HasFactory<PostFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'published_at',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag->id);
    }

    /**
     * @return BelongsToMany<Tag, $this>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return HasMany<Comment, $this>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'status' => PostStatusEnum::class,
        ];
    }
}
