<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

  public function __construct() {
    $this->middleware('auth:api')->except(['index', 'show']);
  }


  public function index() {
    $posts = Post::included()
      ->filter()
      ->sort()
      ->getOrPaginate(2);
    return PostResource::collection($posts);
  }

  public function store(Request $request) {
    return auth()->user();
    return auth()->user();
    $data = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|max:255|unique:posts',
      'extract' => 'required',
      'body' => 'required',
      'category_id' => 'required|exists:categories,id',
      //'user_id' => 'required|exists:users,id',
    ]);

    $user = auth()->user();
    $data['user_id'] = $user->id;

    $posts = Post::create($data);
    return PostResource::make($posts);
  }

  public function show($id) {
    $post = Post::included(['posts'])->findOrFail($id);
    return PostResource::make($post);
  }

  public function update(Request $request, Post $post) {
    $data = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|max:255|unique:posts,slug,' . $post->id,
      'extract' => 'required',
      'body' => 'required',
      'category_id' => 'required|exists:categories,id',
      // 'user_id' => 'required|exists:users,id',
    ]);

    $user = auth()->user();
    $data['user_id'] = $user->id;

    $post->update($request->all());
    return PostResource::make($post);
  }

  public function destroy(Post $post) {
    $post->delete();
    return PostResource::make($post);
  }
}