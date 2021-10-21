<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use MartinButt\Laravel\Adsense\Facades\AdsenseFacade;

use Adsense;

class LandingController extends Controller
{

    use AuthenticatesUsers;

    public function index()
    {
    

      if (Auth::check() && Auth::user()->role->id === 1) {
          return redirect()->route('admin.dashboard');
      } if (Auth::check() && Auth::user()->role->id === 2) {
          return redirect()->route('home.index');
      } else {
          return view('landing', compact(''));
      }
        

    }

    public function register(Request $data)
    {
        
        return $data;

    }
}