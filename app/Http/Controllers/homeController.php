<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class homeController extends Controller
{
    public function index()
    {
        return view('home',[
            'posts'=>Post::all()
        ]);
    }
}
