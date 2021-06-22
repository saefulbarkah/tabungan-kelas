<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index',compact('user'));
    }

    public function create()
    {
        $role = Role::all();
        return view('user.create',compact('role'));
    }

    public function store(Request $request)
    {

        $pesan = [
            'required' => 'Bidang :attribute wajib diisi',
            'confirmed' => ':attribute tidak sama',
            'unique' => ':attribute sudah di ambil',
            'min'    => ':attribute harus minimal 3 karakter',
            'max'    => ':attribute tidak boleh lebih dari 50 karakter.',
            'email'  => ':attribute harus berupa alamat email yang valid.'
        ];
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ],$pesan);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect('data-user')->with('berhasil');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $user->first();
        $role = Role::all();
        return view('user.edit',compact('user','role'));
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect('data-user')->with('berhasil');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->syncRoles();
        $user->delete();
        return redirect('data-user')->with('berhasil');
    }

}
