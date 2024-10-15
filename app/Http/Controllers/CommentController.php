<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Comment::class);

        return CommentResource::collection(Comment::all());
    }

    public function store(CommentRequest $request): JsonResource
    {
        $this->authorize('create', Comment::class);

        return new CommentResource(Comment::create($request->validated()));
    }

    public function show(Comment $comment): JsonResource
    {
        $this->authorize('view', $comment);

        return new CommentResource($comment);
    }

    public function update(CommentRequest $request, Comment $comment): JsonResource
    {
        $this->authorize('update', $comment);

        $comment->update($request->validated());

        return new CommentResource($comment);
    }

    public function destroy(Comment $comment): JsonResponse
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json();
    }
}
