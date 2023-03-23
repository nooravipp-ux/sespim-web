<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;

class PerpustakaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $liblaries = DB::table('t_perpustakaan')->get();
        return view('admin.perpustakaan.index', compact('liblaries'));
    }

    public function create()
    {
        return view('admin.perpustakaan.create');
    }

    public function save(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image_cover' => 'required|mimes:jpg,png,jpeg',
            'file' => 'required|mimes:pdf'
        ]);
        

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

    public function edit($id)
    {
        $data = DB::table('t_perpustakaan')->where('id', $id)->first();
        return view('admin.perpustakaan.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $file_image_cover = $request->file('image_cover');
        $file_image_cover_fileName = NULL;

        $file = $request->file('file');
        $fileName = NULL;

        if($file_image_cover){
            $request->validate([
                'image_cover' => 'required|mimes:jpg,png,jpeg',
            ]);
        }

        if($file){
            $request->validate([
                'file' => 'required|mimes:pdf'
            ]);
        }

        if ($file_image_cover) {
            $file_image_cover_fileName = time() . "_" . $file_image_cover->getClientOriginalName();
            $file_image_cover_destinationPath = public_path() . '/assets/img/image-cover';
            $file_image_cover->move($file_image_cover_destinationPath, $file_image_cover_fileName);

            if(File::exists(public_path('/assets/img/image-cover/'.$request->image_cover_existing))){
                File::delete(public_path('/assets/img/image-cover/'.$request->image_cover_existing));
            }

        } else {
            $file_image_cover_fileName = $request->image_cover_existing;
        }

        if ($file) {
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file_destinationPath = public_path() . '/assets/file';
            $file->move($file_destinationPath, $fileName);

            if(File::exists(public_path('/assets/file/'.$request->file_existing))){
                File::delete(public_path('/assets/file/'.$request->file_existing));
            }

        } else {
            $fileName = $request->file_existing;
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
        $data = DB::table('t_perpustakaan')->where('id', $id)->first();
        DB::table('t_perpustakaan')->where('id', $id)->delete();

        if(File::exists(public_path('/assets/img/image-cover/'.$data->image_cover))){
            File::delete(public_path('/assets/img/image-cover/'.$data->image_cover));
        }

        if(File::exists(public_path('/assets/file/'.$data->file))){
            File::delete(public_path('/assets/file/'.$data->file));
        }

        return redirect()->back();
    }
}
