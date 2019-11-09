<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Auth\LoginRequest;
use Auth;
class AuthController extends Controller
{
    use AuthenticatesUsers;
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        if ($this->attemptLogin($request)) {
            return redirect()->route('users.index');
        
        }else{
        return redirect()->route('auth.showLoginForm');

    }
}
 public function logout()
    {
        Auth::guard()->logout();
        return redirect()->route('auth.showLoginForm');
    }
}