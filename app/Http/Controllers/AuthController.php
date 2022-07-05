<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register_show()
    {
        return view('auth.register');
    }

    public function register_perform(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['bail', 'unique:users', 'required', 'string', 'min:5', 'max:255'],
            'email' => ['unique:users', 'required'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
            'avatar' => ['required'],
        ]);

        $filename =  Str::lower($request->name) . '.' . $request->avatar->extension();

        User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']),
            'avatar' => 'avatars/' . $filename
        ]);

        $request->file('avatar')->storeAs(
            'avatars',
            $filename,
            'public',
        );

        return redirect()->back()->with('success', 'Compte bien enregistré.');
    }

    public function login_show()
    {
        return view('auth.login');
    }


    public function login_perform(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('name', 'password');

        if (!Auth::validate($credentials)) :
            return redirect()->back()->with('success', 'Identifiants incorrects');
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        return view('welcome', compact(['user']));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function password_show()
    {
        return view('auth.password');
    }

    public function password_update(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        DB::table('users')
            ->where('email', '=', $validateData['email'])
            ->update([
                'password' => bcrypt($validateData['password']),
            ]);

        return redirect()->back()->with('success', 'Mot de passe modifié avec succès');
    }
}
