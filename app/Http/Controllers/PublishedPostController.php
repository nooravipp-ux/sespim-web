<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublishedPostController extends Controller
{
    public function postDetail($id, $slug){
        $categories = DB::table('m_category')->get();
        $post = DB::table('t_post')->where('id', $id)->first();
        $latestPost = DB::table('t_post')->where('category_id', $post->category_id)->orderBy('created_at', 'DESC')->limit(5)->get();
        return view('detail-kegiatan', compact('post', 'categories', 'latestPost'));
    }

    public function kabarSespimByCategori($categoryId){
        $posts = DB::table('t_post')->where('category_id', $categoryId)->get();
        $category = DB::table('m_category')->where('id', $categoryId)->first();
        return view('kabar-sespim', compact('posts', 'category'));
    }
}
