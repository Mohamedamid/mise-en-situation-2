<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function indexlogin(){
        return view('login');
    }
    public function indexregister(){
        $Roles = Role::all();
        return view('register', compact('Roles'));
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user = Auth::user();
        RoleUser::create([
            'role_id' => $request->role,
            'user_id' => $user->id,
        ]);
        Auth::login($user);

        return redirect()->route('login');
        /**
         * insert into user(name ,email ,password) VALUES($name ,$email ,$password) 
         */
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return redirect()->route('dashboard');
        }

        return redirect()->route('login');
    }

    /**
     * select email ,password from user where email = $email and password = $password
     */

}
