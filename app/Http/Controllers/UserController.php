<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class UserController extends Controller
{
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
    public function profile(User $user)
    {
        return view('user.profile',[
            'user'=>$user,
            'categories'=>Category::all()
        ]);
    }
    public function message()
    {
        $user = User::find(auth::id());
        $message = $user->messageReceive()->get();
        //dd($message);
        return view('user.message',[
            'messages'=>$message
        ]);
    }
    public function setting()
    {
        $user = Auth::user();
        return view('user.setting',[
            'user'=>$user,
            'categories'=>Category::all()
        ]);
    }
    public function update(Request $request,User $user)
    {
        if(!Hash::check($request->get('pass'),$user->password))
        {
            return back()->withErrors('پسورد اشتباه است');
        }
        if($request->get('newPass') != null)
        {
            $password = bcrypt($request->get('newPass'));
        }
        else
        {
            $password = $user->password;
        }
        User::query()->where('id',$user->id)->update([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$password,
            'fee'=>$request->get('fee'),
            'about'=>$request->get('about')
        ]);
        $user->games()->sync($request->get('games'));
        return back();
    }
}
