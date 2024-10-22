<?php

namespace App\Http\Resources;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

/** @mixin Post */ class PostResource extends JsonResource
{
    private bool $withLikePermission = false;

    private bool $withBody = false;

    public function withLikePermission(): self
    {
        $this->withLikePermission = true;

        return $this;
    }

    public function withBody(): self
    {
        $this->withBody = true;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'stripped_content' => $this->getStrippedContent(),
            'published_at' => $this->published_at,
            'likes_count' => Number::abbreviate($this->likes_count),
            'body' => $this->when(condition: $this->withBody, value: $this->body),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'tags' => TagResource::collection($this->whenLoaded('tags')),

            'can' => [
                'like' => $this->when($this->withLikePermission, fn () => $request->user()?->can('create', [Like::class, $this->resource])),
            ],
        ];
    }

    protected function getStrippedContent(int $stripLength = 255): string
    {
        $text = html_entity_decode($this->html);
        $text = trim(strip_tags($text));

        return substr($text, 0, $stripLength).'...';
    }
}
