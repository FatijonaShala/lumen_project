<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

   public function show($id)
    {
        return Admin::findOrFail($id);
    }


    public function show($name)
    {
        return Admin::findOrFail($name);
    }


        public function show($email)
    {
        return Admin::findOrFail($name);
    }


        public function show($remember_token)
    {
        return User::findOrFail($remember_token);
    }



    //delete post
   public function deletePost($id){
    $post = Post::find($id);
    $post->delete();

    return response()->json('Removed successfully.');
    }

    //list post
    public function index(){
    $post = Post::all();

     return response()->json($post);

    }
}
