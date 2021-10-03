<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments')->get();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $post = new Post([
            'name' => request()->get('name'),
        ]);
        $post->save();
        return response()->json([
            "message" => "Post Added Successfully",
            "Post" => $post
        ]);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->with('comments')->first();
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Post::where('id', $id)->first();
        $post->update($data);


        return response()->json([
            "message" => "Post Updated Successfully",
            "Post" => $post
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response()->json('Post Deleted Successfully');
    }
}
