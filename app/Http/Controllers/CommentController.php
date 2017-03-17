<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(Comment::get());
    }

    public function store(Request $request)
    {
        $Comment = new Comment;
        $Comment->author = $request->input('author');
        $Comment->text = $request->input('text');
        $Comment->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return response()->json(['success' => true]);
    }

}
