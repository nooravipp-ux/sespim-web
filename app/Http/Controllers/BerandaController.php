<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $data = DB::table('t_beranda')->first();
        return view('admin.beranda.index', compact('data'));
    }

    public function save(Request $request)
    {
        $file = $request->file('file');
        $fileName = NULL;

        if ($file) {
            if ($request->media_type == 1) {
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file_destinationPath = public_path() . '/assets/media/img';
                $file->move($file_destinationPath, $fileName);
            } elseif ($request->media_type == 2) {
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file_destinationPath = public_path() . '/assets/media/vid';
                $file->move($file_destinationPath, $fileName);
            }
        }

        $data = DB::table('t_beranda')->first();
        // dd($data);
        if ($data == null) {
            if($request->media_type == 1 || $request->media_type == 2 ){
                DB::table('t_beranda')->insert([
                    "title" => $request->title,
                    "description" => $request->description,
                    "media_type" => $request->media_type,
                    "file" => $fileName,
                    "publish" => $request->publish,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => Auth::user()->name
                ]);
            }else{
                DB::table('t_beranda')->insert([
                    "title" => $request->title,
                    "description" => $request->description,
                    "media_type" => $request->media_type,
                    "link" => $request->link,
                    "publish" => $request->publish,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => Auth::user()->name
                ]);
            }
        } else {
            if($request->media_type == 1 || $request->media_type == 2 ){
                DB::table('t_beranda')->where('id', $request->id)->update([
                    "title" => $request->title,
                    "description" => $request->description,
                    "media_type" => $request->media_type,
                    "file" => $fileName,
                    "publish" => $request->publish,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => Auth::user()->name
                ]);
            }else{
                DB::table('t_beranda')->where('id', $request->id)->update([
                    "title" => $request->title,
                    "description" => $request->description,
                    "media_type" => $request->media_type,
                    "link" => $request->link,
                    "publish" => $request->publish,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => Auth::user()->name
                ]);
            }
        }

        return redirect()->back();
    }
}
