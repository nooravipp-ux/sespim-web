<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = DB::table('users')
                ->select('users.id', 'users.name as username', 'm_role.name as role_name')
                ->join('m_role', 'm_role.id', '=', 'users.role_id')
                ->get();
        return view('admin.users.index', compact('users'));
    }

    public function create(){
        $roles = DB::table('m_role')->get();
        return view('admin.users.create', compact('roles'));
    }

    public function save(Request $request){
        DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "role_id" => $request->role_id,
            "password" => Hash::make("Pass123"),
        ]);

        return redirect()->route('user.index');
    }

    public function changePassword()
    {
        return view('admin.user.change-password');
    }

    public function storeChangedPassword(Request $request)
    {
        $userId = auth()->user()->id;
        $newPassword = Hash::make($request->newPassword);

        $user = DB::table('users')->where('id', $userId)->first();

        if(!Hash::check($request->currentPassword, $user->password)){
            return back()->with('msg', 'Password yang anda masukan salah !');
        }

        if($request->newPassword != $request->confirmPassword){
            return back()->with('msg1', 'Mohon confirmasi password baru anda !');
        }

        DB::table('users')->where('id', $userId)->update(['password' => $newPassword]);
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
