<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $comments = new Comment([
            'post_id' => request()->get('post_id'),
            'comment' => request()->get('comment'),
        ]);
        $comments->save();
        return response()->json([
            "message" => "Comment Added Successfully",
            "Comment" => $comments
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $comments = Comment::where('id', $id)->first();
        $comments->update($data);


        return response()->json([
            "message" => "Post Updated Successfully",
            "Post" => $comments
        ]);
    }

    public function destroy($id)
    {
        $comments = Comment::find($id);

        $comments->delete();

        return response()->json('Comment Deleted Successfully');
    }
}
