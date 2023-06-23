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
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Store the new photo
            $photoPath = $request->file('photo')->store('public/photos');

            // Update the photo URL in the user model
            $user->photo_url = str_replace('public/', '', $photoPath);
        }

        $user->save();

        return redirect()->route('users.show', $user);
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
