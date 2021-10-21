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

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use MartinButt\Laravel\Adsense\Facades\AdsenseFacade;

use Adsense;


class HerramientaController extends Controller
{
  use AuthenticatesUsers;

  public function index()
  {
    if (Auth::check() && Auth::user()->role->id === 1) {
        return redirect()->route('admin.dashboard');
    } if (!Auth::check()) {
        return redirect()->route('mainlanding');
    }

    $herras = Post::where('is_post', false)
      ->paginate(16);

    return view('herra', compact('herras'));
  }

  public function details($slug)
  {
    $post = Post::where('slug', $slug)
      ->where('is_post', false)
      ->first();
        
     $blog_key = "blog_{$post->id}";

    if (!Session::has($blog_key)) {
      $post->increment('view_count');
      Session::put($blog_key, 1);
    }

    return view('herra-details', compact('post'));
  }

}