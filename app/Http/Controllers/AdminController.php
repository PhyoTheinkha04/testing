<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credit = $request->only('email', 'password');

        dd(Auth::guard('admin')->attempt($credit));
        // if (
        //     Auth::guard('admin')->attempt(
        //         ['email' => $request->email, 'password' => $request->password]
        //     )
        // ) {
        //     return redirect()->route('admin.dashboard');
        // } else {
        //     session()->flash('error', 'Either Email/Password is incorrect');
        //     return back()->withInput($request->only('email'));
        // }

    }
}
