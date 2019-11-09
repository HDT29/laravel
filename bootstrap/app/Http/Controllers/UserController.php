<?php

namespace App\Http\Controllers;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = User::all();

    return view('users.index',
        ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
    $users=User::create([
        'name' => $data['name'],
        'birthday' => $data['birthday'],
        'phone' => $data['phone'],
        'email' => $data['email'],
        'role' => 'user',
        'password' =>bcrypt('12345'),
    ]);
    return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $user = User::find($id);
    
    return view('users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $user = User::find($id);
    return view('users.edit', 
        ['user'=>$user]);
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
       
    $user = User::find($id);
    if (isset($request->is_active)) {
        $user->is_active=$request->is_active;
        $user->save();
        return redirect()->route('users.index'); 
    }
    $user->name=$request->name;
    $user->birthday=$request->birthday;
    $user->phone=$request->phone;
    $user->email=$request->email;
    $user->save();
    return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $user = User::find($id);
    $user->delete();
    
    return redirect()->route('users.index');
    }

     

}   
