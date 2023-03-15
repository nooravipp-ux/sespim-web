<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(){
        $roles = DB::table('m_role')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function save(Request $request){
        DB::table('m_role')->insert([
            "name" => $request->name,
            "description" => $request->description,
            'created_at' => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->route('role.index');
    }
}
