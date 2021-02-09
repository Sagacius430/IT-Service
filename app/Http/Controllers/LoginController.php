<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials   =[
            'email'   => $request->email,
            'password'=> $request->password
        ];
        
        
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard.index');
        }
        

        return redirect()->route('login.index')
            ->with('msg_error','Falha na autenticação');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
