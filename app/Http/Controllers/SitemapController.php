<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TitleUser;

class SitemapController extends Controller
{
    public function index()
    {
        // creamos el nuevo objeto sitemap
        $sitemap_contents = \App::make("sitemap");
        // establecer cache
        /* $sitemap_contents->setCache('laravel.sitemap_contents', 3600); */
        // obtener todos los posts de la base de datos
        $blogs =  TitleUser::where('status_pay', 1)->orderBy('created_at', 'desc')->get();
        // agregar todos los posts al sitemap
        foreach ($blogs as $blog) {
            $url = url('titulo/' . $blog->slug);
            $sitemap_contents->add($url, $blog->updated_at, '1.0', 'daily');
        }
        // mostrar el sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap_contents->render('xml');
    }
}
