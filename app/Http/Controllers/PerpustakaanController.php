<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PerpustakaanController extends Controller
{
    public function index(){
        $liblaries = DB::table('t_perpustakaan')->get();
        return view('admin.perpustakaan.index', compact('liblaries'));
    }

    public function create(){
        return view('admin.perpustakaan.create');
    }

    public function save(Request $request){

        $file_image_cover = $request->file('image_cover');
        $file_image_cover_fileName = NULL;

        if ($file_image_cover) {
            $file_image_cover_fileName = time() . "_" . $file_image_cover->getClientOriginalName();
            $file_image_cover_destinationPath = public_path() . '/assets/img/image-cover';
            $file_image_cover->move($file_image_cover_destinationPath, $file_image_cover_fileName);
        }

        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file_destinationPath = public_path() . '/assets/file';
            $file->move($file_destinationPath, $fileName);
        }

        DB::table('t_perpustakaan')->insert([
            "title" => $request->title,
            "description" => $request->description,
            "file" => $fileName,
            "image_cover" => $file_image_cover_fileName,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => Auth::user()->name
        ]);
        return redirect()->route('perpustakaan.index');
    }

    public function edit($id){
        $data = DB::table('t_perpustakaan')->where('id', $id)->first();
        return view('admin.perpustakaan.edit', compact('data'));
    }

    public function update(Request $request){

        $file_image_cover = $request->file('image_cover');
        $file_image_cover_fileName = NULL;

        if ($file_image_cover) {
            $file_image_cover_fileName = time() . "_" . $file_image_cover->getClientOriginalName();
            $file_image_cover_destinationPath = public_path() . '/assets/img/image-cover';
            $file_image_cover->move($file_image_cover_destinationPath, $file_image_cover_fileName);
        }else{
            $file_image_cover_fileName = $request->image_cover_existing;
        }

        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file_destinationPath = public_path() . '/assets/file';
            $file->move($file_destinationPath, $fileName);
        }else{
            $fileName = $request->filename_existing;
        }

        DB::table('t_perpustakaan')->where('id', $request->id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "file" => $fileName,
            "image_cover" => $file_image_cover_fileName,
            'updated_at' => date("Y-m-d H:i:s"),
            'updated_by' => Auth::user()->name
        ]);
        return redirect()->route('perpustakaan.index');
    }

    public function delete($id)
    {
        DB::table('t_perpustakaan')->where('id', $id)->delete();
        return redirect()->back();
    }
}
