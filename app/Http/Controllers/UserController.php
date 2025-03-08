<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Registration Successful! Please login.'], 201);
    }

    // User Login
    public function login(Request $request)
    {

       
        if (Auth::check()) {

            $user = Auth::user();
            $redirect="/profile";

            if($user->type=="Admin"){
                $redirect="/dashboard";
            }

            return redirect($redirect);
        }

        $request->validate([
            'login' => 'required', // Can be email or username
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $request->login, 'password' => $request->password])) {

            // Get the authenticated user
            $user = Auth::user();
            $redirect="/profile";

            if($user->type=="Admin"){
                $redirect="/dashboard";
            }

            return response()->json(['message' => 'Login Successful', 'redirect' => $redirect,'data'=> $user ]);
        }

        return response()->json(['error' => 'Invalid Credentials'], 401);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('message', 'Logged out successfully!');
    }

    public function profile()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('Profile.profile', compact('user')); // Pass user data to the view
    }
}
