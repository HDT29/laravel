<?php

namespace App\Http\Controllers;
use App\Models\Category;;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $posts = Post::all();

    return view('posts.index',
        ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',['categories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
    $data=$request->all();
    $post=Post::create([
        'title' =>$data['title'],
        'content' => $data['content'],
        'category_id' => $data['category_id'],
        'user_id' =>1,
    ]);
    return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $post = Post::find($id);
    
    return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $categories = Category::all();
    $post = Post::find($id);
    return view('posts.edit', 
        ['post'=>$post],['categories' => $categories]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $post = Post::find($id);

     if (isset($request->user_id)) {
        $post->user_id=$request->user_id;
        $post->save();
        return redirect()->route('posts.index'); 
    }

    $post->title=$request->title;
    $post->content=$request->content;
    $post->category_id=$request->category_id;
    $post->save();
    return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $post = Post::find($id);
    $post->delete();
    
    return redirect()->route('posts.index');
    }
    
}
