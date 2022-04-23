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
        $type = 1;
        $titulo = 'Editar perfíl';
        return view('content_profile', compact('type', 'titulo'));
    }

    public function setPassword()
    {
        $type = 2;
        $titulo = 'Cambiar contraseña';
        return view('content_profile', compact('type', 'titulo'));
    }

    public function sitemap()
    {

        // creamos el nuevo objeto sitemap
        $sitemap_contents = \App::make("sitemap");
        // establecer cache
        /* $sitemap_contents->setCache('laravel.sitemap_contents', 3600); */
        // obtener todos los posts de la base de datos
        $blogs =  TitleUser::where('status_pay', 1)->orderBy('created_at', 'desc')->get();
        // agregar todos los posts al sitemap
        foreach ($blogs as $blog)
        {
            $url = url('titulo/'.$blog->slug);
            $sitemap_contents->add($url, $blog->updated_at,'1.0','daily');
        }
        // mostrar el sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap_contents->render('xml');

      
    }

}
