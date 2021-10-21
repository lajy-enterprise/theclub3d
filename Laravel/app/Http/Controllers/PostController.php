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
      ->paginate(16);

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
    
    $blog_key = "blog_{$post->id}";
    if (!Session::has($blog_key)) {
      $post->increment('view_count');
      Session::put($blog_key, 1);
    }

    $dia_actual = Carbon::now()->format('d-m-Y');
    $semana_ano = Carbon::now()->weekOfYear;
    $filename= 'semana_'.$semana_ano.'.json';
    $path = storage_path() . '/app/estadisticas/posts/';

    if(Storage::disk('local')->exists('/estadisticas/posts/'.$filename)){
      $json = File::get($path.$filename);
      $archivo = json_decode($json, true);
      $key = array_search($dia_actual, array_column($archivo, "date"));
      if ($key !== false) {
        $buscar = $archivo[$key]["tools"];
        if (empty($archivo[$key]["tools"][$slug])) {
          $archivo[$key]["tools"] += [ $slug => 1 ];
        }else{
          foreach ($buscar as $clave => $valor) {
            if ($clave === $slug) {
              $archivo[$key]["tools"][$clave]=$valor+1;
            }
          }
        }
        $jsito = json_encode($archivo);
        $fp = fopen($path.$filename, "w");
        fwrite($fp, $jsito);
        fclose($fp);
      }else{
        $arraicito= array(
          "date" => $dia_actual,
          "tools" => array($slug => 1) 
        );

        array_push($archivo, $arraicito);

        $jsito = json_encode($archivo);
        $fp = fopen($path.$filename, "w");
        fwrite($fp, $jsito);
        fclose($fp);
      }
    }else{
      $arraicito= array(
        array(
        "date" => $dia_actual,
        "tools" => array($slug => 1) 
        )
      );

      $jsiton = json_encode($arraicito);
      Storage::put('/estadisticas/posts/'.$filename, $jsiton);
    }

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
