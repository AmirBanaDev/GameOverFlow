<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthenticateController extends Controller
{
    public function index()
    {
        return view('authenticate.authentication');
    }
    public function register(Request $request)
    {
        User::query()->create([
            'name'=>$request->get('user'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('pass')),
            'role'=>'normal',
        ]);
        return redirect('/');
    }
    public function login(Request $request)
    {
        $user = User::query()->where('email',$request->get('email'))->first();
        if($user == null)
        {
            return back()->withErrors(['email'=>'ایمیل یا رمز عبور اشتباه است']);
        }
        if(!Hash::check($request->get('pass'),$user->password))
        {
            return back()->witherrors(['pass'=>'ایمیل یا رمز عبور اشتباه است']);
        }
        auth()->login($user);
        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
