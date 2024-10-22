<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeRequest;
use App\Http\Resources\LikeResource;
use App\Models\Like;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LikeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Like::class);

        return LikeResource::collection(Like::all());
    }

    public function store(LikeRequest $request)
    {
        $this->authorize('create', Like::class);

        return new LikeResource(Like::create($request->validated()));
    }

    public function show(Like $like)
    {
        $this->authorize('view', $like);

        return new LikeResource($like);
    }

    public function update(LikeRequest $request, Like $like)
    {
        $this->authorize('update', $like);

        $like->update($request->validated());

        return new LikeResource($like);
    }

    public function destroy(Like $like)
    {
        $this->authorize('delete', $like);

        $like->delete();

        return response()->json();
    }
}
