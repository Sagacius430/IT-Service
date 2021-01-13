<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{client,machine,User};

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $counts = [
            
        //     'clients'  => client::count(),
        //     // 'users'    => User::count(),

        // ];
        return view('dashboard');
    }

}
