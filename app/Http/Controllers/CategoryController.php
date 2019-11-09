<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $categories = Category::all();

    return view('categories.index',
        ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
    $category=Category::create([
        'user_id' =>1,
        'name' => $data['name'],
    ]);
    return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $category = Category::find($id);
    
    return view('categories.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\ResponseCategory
     */
    public function edit($id)
    {
    $category = Category::find($id);
    return view('categories.edit', 
        ['category'=>$category]);
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
    $category = Category::find($id);

     if (isset($request->user_id)) {
        $category->user_id=$request->user_id;
        $category->save();
        return redirect()->route('categories.index'); 
    }
    $category->name=$request->name;
    $category->save();
    return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $category = Category::find($id);
    $category->delete();
    
    return redirect()->route('categories.index');
    }
}
