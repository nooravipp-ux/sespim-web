<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $beranda = DB::table('t_beranda')->first();
        $posts = DB::table('t_post')->get();
        $newestPost = DB::table('t_post')->orderBy('id', 'DESC')->limit(3)->get();
        return view('welcome', compact('posts', 'newestPost', 'beranda'));
    }

    public function sejarah(){
        $content = DB::table('t_page')->where('id', 1)->first();
        return view('sejarah-sespim', compact('content'));
    }

    public function profil(){
        $content = DB::table('t_page')->where('id', 2)->first();
        return view('profil-sespim', compact('content'));
    }

    public function struktur(){
        $content = DB::table('t_page')->where('id', 3)->first();
        return view('struktur-sespim', compact('content'));
    }

    public function kurikulum(){
        $content = DB::table('t_page')->where('id', 4)->first();
        return view('kurikulum-sespim', compact('content'));
    }

    public function galeri(){
        $medias = DB::table('t_galeri')->where('media_type', 'image')->get();
        return view('galeri', compact('medias'));
    }

    public function galeriVideo(){
        $medias = DB::table('t_galeri')->where('media_type', 'video')->get();
        return view('galeri-video', compact('medias'));
    }

    public function perpustakaan(){
        $books = DB::table('t_perpustakaan')->get();
        return view('perpustakaan', compact('books'));
    }
}
