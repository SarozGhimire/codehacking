<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use App\Photo;
use App\Role;
use App\User;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $user_count = User::get()->count();

        $posts = Post::all();
        $post_count = Post::get()->count();

        $categories = Category::all();
        $category_count = Category::get()->count();

        $medias = Photo::all();
        $media_count = Photo::get()->count();

        return view('admin.index', compact('users', 'user_count', 'posts', 'post_count', 'categories', 'category_count', 'medias', 'media_count'));
    }

   
}
