<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use App\User;
use App\Post;



class CommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {

       $data = new Comment;
       $data->user_id = Auth::user()->id;
       $data->user_name = Auth::user()->name;
       $data->post_id = $post->id;
       $data->body = $request->get('body');
       $data->save();

       return redirect()->back();
   }

   public function destroy($id)
   {
        //
    $data = Comment::where('id', $id)->first();
    $data->delete();
    return redirect()->back();
}
}
