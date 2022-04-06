<?php

namespace App\Http\Controllers;

use App\Models\TitleRating;
use App\Models\TitleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $path_image;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->path_image = 'storage';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::id()) {
          
            return view('landing');
        } else {
            return view('welcome');
        }
    }

    public function randomTitle()
    {
        $get_title = TitleUser::random();
        $data = array('titles' => $get_title, 'path' => $this->path_image);
        return response()->json($data);
    }

    public function titleEdit($title_id)
    {
        $title = TitleUser::find($title_id);
        $titulo = $title->titulo;
        $title_id = $title->id;
        return view('content_title', compact('titulo', 'title_id'));
    }

    public function myTitles()
    {
        return view('my_titles');
    }

    public function titleCreate()
    {
        $titulo   = 'Nuevo título';
        $title_id = null;
        
        return view('content_title', compact('titulo', 'title_id'));
    }

    public function titleShow($slug)
    {
        $title  = TitleUser::where('slug', $slug)->first();
        return view('title', compact('title'));
    }

    public function rateTitle($title_id, $rate)
    {
        return TitleRating::saveEdit($title_id, $rate);
    }

    public function profile()
    {
        
    }

}
