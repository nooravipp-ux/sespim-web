<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $categories = DB::table('m_category')->get();
        $posts = DB::table('t_post')->get();
        return view('admin.posts.index', compact('categories', 'posts'));
    }

    public function create(){
        $categories = DB::table('m_category')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function save(Request $request){
        DB::table('t_post')->insert([
            "title" => $request->title,
            "author_id" => Auth::user()->id,
            "category_id" => $request->category_id,
            "content" => $request->content,
            "image_banner" => $request->image_banner
        ]);

        return redirect()->route('post.index');
    }

    public function edit($id){

    }

    public function update(Request $request){

    }

    public function delete($id){
        DB::table('t_post')->where('id', $id)->delete();
        return redirect()->back();
    }
}
