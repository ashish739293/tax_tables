<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            $user = User::where('email',$email)->first();
            Auth::login($user);
            return redirect('/login');
        }else{
            return back()->withErrors(['Invalid credentials!']);
        }
    }

    public function invoices()
    {
        return view('invoices');
    }

    public function subscriptions()
    {
        return view('subscriptions');
    }

    public function paymentConfirmation()
    {
        return view('payment-confirmation');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blogs()
    {
        return view('blogs',['title' => '| blogs']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
