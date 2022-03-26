<?php

namespace App\Http\Controllers;

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
        $this->path_image = 'img/title';
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
        return view('content_title', compact('title'));
    }
}
