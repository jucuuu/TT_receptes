<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Store comment data
    public function store(Request $request) {
        $content = $request->validate([
            'content' => 'required',
        ]);
        
        $comment = new Comment;
        $comment->content = $content['content'];
        $comment->user_id = Auth::id();
        $comment->recipe_id = (int)$request->input('recipe_id');

        $comment->save();

        return redirect()->back()->with('message', 'Comment posted successfully!');
    }

    // Show edit form
    public function edit(Comment $comment) {
        return view('comments.edit', ['comment' => $comment]);
    }
    
    // Store updated comment
    public function update(Request $request, Comment $comment) {
        $formFields = $request->validate([
            'content' => 'required',
        ]);

        $comment->update($formFields);
        $recipe = $comment->recipe;

        return redirect('/recipes/'.$comment->recipe_id)->with('message', 'Comment updated successfully!');
    }

    // Delete comment
    public function destroy($id) {   
        Comment::find($id)->delete();
        return redirect()->back()->with('message', 'Comment deleted successfully');
    }
}
