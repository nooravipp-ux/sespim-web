<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TentangController extends Controller
{
    public function index(){
        $pages = DB::table('t_page')->get();
        return view('admin.tentang.index', compact('pages'));
    }

    public function create(){
        return view('admin.tentang.create');
    }

    public function save(Request $request){

        $file_image_banner = $request->file('image_banner');
        $file_image_banner_fileName = NULL;

        if ($file_image_banner) {
            $file_image_banner_fileName = time() . "_" . $file_image_banner->getClientOriginalName();
            $file_image_banner_destinationPath = public_path() . '/assets/img/image-banner';
            $file_image_banner->move($file_image_banner_destinationPath, $file_image_banner_fileName);
        }

        DB::table('t_page')->insert([
            "page_title" => $request->page_title,
            "description" => $request->description,
            "content" => $request->content,
            "image_banner" => $file_image_banner_fileName,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => Auth::user()->name
        ]);

        return redirect()->route('tentang.index');
    }

    public function edit($id){
        $data = DB::table('t_page')->where('id', $id)->first();
        return view('admin.tentang.edit', compact('data'));
    }

    public function update(Request $request){

        $file_image_banner = $request->file('image_banner');
        $file_image_banner_fileName = NULL;

        if ($file_image_banner) {
            $file_image_banner_fileName = time() . "_" . $file_image_banner->getClientOriginalName();
            $file_image_banner_destinationPath = public_path() . '/assets/img/image-banner';
            $file_image_banner->move($file_image_banner_destinationPath, $file_image_banner_fileName);
        }else{
            $file_image_banner_fileName = $request->image_banner_existing;
        }

        DB::table('t_page')->where('id', $request->id)->update([
            "page_title" => $request->page_title,
            "description" => $request->description,
            "content" => $request->content,
            "image_banner" => $file_image_banner_fileName,
            'updated_at' => date("Y-m-d H:i:s"),
            'updated_by' => Auth::user()->name
        ]);

        return redirect()->route('tentang.index');
    }
}
