<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            "created_at" => date("Y-m-d H:i:s"),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->route('role.index');
    }

    public function edit($id){
        $role = DB::table('m_role')->where('id', $id)->first();
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request){
        DB::table('m_role')->where('id', $request->id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "updated_at" => date("Y-m-d H:i:s"),
            "updated_by" => Auth::user()->name
        ]);

        return redirect()->route('role.index');
    }
}
