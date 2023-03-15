<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function index()
    {
        $galeries = DB::table('t_galeri')->get();
        return view('admin.galeri.index', compact('galeries'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function save(Request $request)
    {

        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            if ($request->media_type == "image") {
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file_destinationPath = public_path() . '/assets/media/img';
                $file->move($file_destinationPath, $fileName);
            } else {
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file_destinationPath = public_path() . '/assets/media/vid';
                $file->move($file_destinationPath, $fileName);
            }
        }

        DB::table('t_galeri')->insert([
            "title" => $request->title,
            "description" => $request->description,
            "media_type" => $request->media_type,
            "file" => $fileName,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => Auth::user()->name
        ]);

        return redirect()->route('galeri.index');
    }

    public function edit($id)
    {
        $data = DB::table('t_galeri')->where('id', $id)->first();
        return view('admin.galeri.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            if ($request->media_type == "image") {
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file_destinationPath = public_path() . '/assets/media/img';
                $file->move($file_destinationPath, $fileName);
            } else {
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file_destinationPath = public_path() . '/assets/media/vid';
                $file->move($file_destinationPath, $fileName);
            }
        }else{
            $fileName = $request->file_existing;
        }

        DB::table('t_galeri')->where('id', $request->id)->update([
            "title" => $request->title,
            "description" => $request->description,
            "media_type" => $request->media_type,
            "file" => $fileName,
            'updated_at' => date("Y-m-d H:i:s"),
            'updated_by' => Auth::user()->name
        ]);

        return redirect()->route('galeri.index');
    }

    public function delete($id)
    {
        DB::table('t_galeri')->where('id', $id)->delete();
        return redirect()->back();
    }
}
