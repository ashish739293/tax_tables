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

    // Update Password
    public function updatePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => 'Current password is incorrect'], 400);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Password updated successfully']);
    }

    public function resetPassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully!');
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
