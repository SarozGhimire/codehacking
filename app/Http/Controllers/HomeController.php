<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $posts = Post::paginate(5);
        $categories = Category::all();
        return view('home', compact('posts', 'categories','user'));

        
    }

       public function category($id)
    {

        $user = Auth::user();
        $posts = Post::whereCategoryId($id)->paginate(5);
        $categories = Category::all();
        return view('category', compact('posts', 'categories', 'user'));

        
    }

    public function search(Request $request)
    {
        $key = $request->key;
        // echo $key; die();
        $user = Auth::user();
        $posts = Post::where('title','LIKE','%'.$key.'%')->paginate(5);
        $categories = Category::all();
        return view('search', compact('posts', 'categories', 'user', 'key'));

        
    }
    public function author($user_id)
    {

        $user = Auth::user();
        $posts = Post::whereUserId($user_id)->paginate(5);
        $categories = Category::all();
        return view('category', compact('posts', 'categories', 'user'));

        
    }


}
