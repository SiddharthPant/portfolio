<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Post::class);

        return PostResource::collection(Post::all());
    }

    public function store(PostRequest $request): JsonResource
    {
        $this->authorize('create', Post::class);

        return new PostResource(Post::create($request->validated()));
    }

    public function show(Post $post): JsonResource
    {
        $this->authorize('view', $post);

        return new PostResource($post);
    }

    public function update(PostRequest $request, Post $post): JsonResource
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        return new PostResource($post);
    }

    public function destroy(Post $post): JsonResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json();
    }
}
