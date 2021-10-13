<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  use AuthenticatesUsers;

  public function index()
  {
    if (Auth::check() && Auth::user()->role->id === 1) {
        return redirect()->route('admin.dashboard');
    } if (!Auth::check()) {
        return redirect()->route('mainlanding');
    }

    $posts = Post::where('is_approved', true)
      ->where('status', true)
      ->where('is_post', true)
      ->latest()
      ->paginate(6);

    $herras = Post::where('is_post', false)
      ->latest()
      ->paginate(6);

    // $allCategory = Category::all()->first()->get();

    return view('news', compact('posts', 'herras'));
  }

  public function home()
  {
    if (Auth::check() && Auth::user()->role->id === 1) {
        return redirect()->route('admin.dashboard');
    } if (!Auth::check()) {
        return redirect()->route('mainlanding');
    }

    $herras = Post::where('is_post', false)
      ->latest()
      ->paginate(10);

    // $allCategory = Category::all()->first()->get();

    return view('home', compact('herras'));
  }

  public function details($slug)
  {
    $post = Post::where('slug', $slug)
      ->where('is_approved', true)
      ->where('status', true)
      ->where('is_post', true)
      ->first();
    
    if (Post::count() > 3) {
      $random_posts = Post::all()->random(3);  
    }else {
      $random_posts = "nada";
    }
    
    
    /* $blog_key = "blog_{$post->id}";
    if (!Session::has($blog_key)) {
      $post->increment('view_count');
      Session::put($blog_key, 1);
    } */

    /* $comments =  $post->comments; */

    return view('post-details', compact('post', 'random_posts'));
  }

  /*public function postsByCategory($slug)
  {
    $category = Category::where('slug', $slug)->first();

    return view('posts-by-category', compact('category'));

  }

  public function postsByTag($slug)
  {
    $tag = Tag::where('slug', $slug)->first();

    return view('posts-by-tag', compact('tag'));
  }

  public function postsByAuthor($user_id)
  {
    $user = User::where('id', $user_id)->get();
    $postsAuthor = Post::all()->where('user_id', $user_id)->first()->get();
    
    return view('posts-by-author', compact('postsAuthor', 'user'));
  }*/
}
