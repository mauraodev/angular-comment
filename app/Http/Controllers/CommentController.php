<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(Comment::get());
    }

    public function store(Request $request)
    {
        Comment::create(array(
            'author' => $request->input('author'),
            'text' => $request->input('text')
        ));

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return response()->json(['success' => true]);
    }

}
