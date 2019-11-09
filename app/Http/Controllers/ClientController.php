<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function index()
    {
    	$posts = Post::with(['user', 'category'])->paginate(5);
        // dd($posts);
    	return view('client.index',compact('posts'));
    }
    function singlePost($id)
    {
    	$post = Post::find($id);
    	return view('client.single',compact('post'));
    }
    function PostCategory($id)
    {
    	$categories = Category::all();
    	$category = Category::find($id);
    	return view('client.category',compact('categories','category'));
    }
}
