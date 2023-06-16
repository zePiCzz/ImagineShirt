<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::paginate(10);
        //dd($users);
        return view('users.index')->with('users', $users);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ]);

        return redirect()->route('users.index');
    }

    public function edit(Users $user)
    {
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, Users $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('password')) {
            $path = $request->password->store('storage/users/');
            $user->password = basename($path);
        }
        $user->save();

        return redirect()->route('users.index')
            ->with('alert-msg', 'user "' . $user->name . '" foi alterado com sucesso!')
            ->with('alert-type', 'success');
    }

    public function destroy(Users $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('alert-msg', 'user "' . $user->name . '" foi removido com sucesso!')
            ->with('alert-type', 'success');
    }

    public function show(Users $user)
    {
        return view('users.show')->with('user', $user);
    }
}
