<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Post */ class PostResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'stripped_content' => $this->getStrippedContent(),
            'published_at' => $this->published_at,
            'likes_count' => $this->likes_count,
            'dislikes_count' => $this->dislikes_count,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }

    protected function getStrippedContent(int $stripLength = 255): string
    {
        $text = html_entity_decode($this->html);
        $text = trim(strip_tags($text));

        return substr($text, 0, $stripLength).'...';
    }
}
