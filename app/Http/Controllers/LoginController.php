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
        
        $error = [
            'msg_title' => 'Falha na autenticação!',
            'msg_error' => 'Usuário ou senha incorreto.'
          ];


        return redirect()->route('login.index')
            ->with($error);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
    
    //testar recuperação de senha nesta função
    public function ResetPassword(Request $request){
        $password = [
            
        ];
    }

    
}
