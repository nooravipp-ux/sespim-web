<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $categories = DB::table('m_category')->get();
        $posts = DB::table('t_post')
                ->select('t_post.id', 't_post.title', 't_post.summary', 't_post.published', 'm_category.name as category_name', 'users.name')
                ->join('m_category', 'm_category.id', '=', 't_post.category_id')
                ->join('users', 'users.id', '=', 't_post.author_id')
                ->get();
        return view('admin.posts.index', compact('categories', 'posts'));
    }

    public function create()
    {
        $categories = DB::table('m_category')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function save(Request $request)
    {

        $file_image_banner = $request->file('image_banner');
        $file_image_banner_fileName = NULL;

        if ($file_image_banner) {
            $file_image_banner_fileName = time() . "_" . $file_image_banner->getClientOriginalName();
            $file_image_banner_destinationPath = public_path() . '/assets/img/post-images';
            $file_image_banner->move($file_image_banner_destinationPath, $file_image_banner_fileName);
        }

        $category_id = "";

        if(auth()->user()->role_id == 1){ //ADMIN
            $category_id = $request->category_id;
        }

        if(auth()->user()->role_id == 2){ //SESPIM
            $category_id = 1;
        }

        if(auth()->user()->role_id == 3){ //SESPIMA
            $category_id = 2;
        }

        if(auth()->user()->role_id == 4){ //SESPIMEN
            $category_id = 3;
        }

        if(auth()->user()->role_id == 5){ //SESPIMTI
            $category_id = 4;
        }

        DB::table('t_post')->insert([
            "title" => $request->title,
            "author_id" => Auth::user()->id,
            "slug" => $this->slugify($request->title),
            "category_id" => $category_id,
            "content" => $request->content,
            "image_banner" => $file_image_banner_fileName,
            "published" => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => Auth::user()->name
        ]);

        return redirect()->route('post.index');
    }

    public function edit($id){
        $categories = DB::table('m_category')->get();
        $data = DB::table('t_post')->where('id', $id)->first();
        return view('admin.posts.edit', compact('data', 'categories'));
    }

    public function update(Request $request)
    {
        $file_image_banner = $request->file('image_banner');
        $file_image_banner_fileName = NULL;

        if ($file_image_banner) {
            $file_image_banner_fileName = time() . "_" . $file_image_banner->getClientOriginalName();
            $file_image_banner_destinationPath = public_path() . '/assets/img/post-images';
            $file_image_banner->move($file_image_banner_destinationPath, $file_image_banner_fileName);
        }else{
            $file_image_banner_fileName = $request->image_banner_existing;
        }

        DB::table('t_post')->where('id', $request->id)->update([
            "title" => $request->title,
            "summary" => $request->summary,
            "slug" => $this->slugify($request->title),
            "content" => $request->content,
            "image_banner" => $file_image_banner_fileName,
            "published" => $request->published,
            'updated_at' => date("Y-m-d H:i:s"),
            'updated_by' => Auth::user()->name
        ]);

        return redirect()->route('post.index');
    }

    public function delete($id)
    {
        DB::table('t_post')->where('id', $id)->delete();
        return redirect()->back();
    }

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
