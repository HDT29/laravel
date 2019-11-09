<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $comments = Comment::all();

    return view('comments.index',
        ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('comments.create',['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $data=$request->all();
    $comments=Comment::create([
        'post_id' => $data['post_id'],
        'content' => $data['content'],
        'user_id' =>1,
    ]);
    return redirect()->route('comments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $comment = Comment::find($id);
    
    return view('comments.show',['comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $posts = Post::all();
    $comment = Comment::find($id);
    return view('comments.edit', 
        ['comment'=>$comment],['posts'=>$posts]);
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
    $comment = Comment::find($id);
    if (isset($request->is_active)) {
        $comment->is_active=$request->is_active;
        $comment->user_id=$request->user_id;
        $comment->save();
        return redirect()->route('comments.index'); 
    }
    $comment->post_id=$request->post_id;
    $comment->content=$request->content;
    $comment->save();
    return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $comment = Comment::find($id);
    $comment->delete();
    
    return redirect()->route('comments.index');
    }
}
