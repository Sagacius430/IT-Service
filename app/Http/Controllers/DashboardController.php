<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{client,machine,User};
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            
            'clients'  => Client::count(),
            'users'    => User::count(),
            

        ];
        return view('dashboard', compact('counts'));
        // $clients = Client::all();
        // $machines = Machine::all(); 
        // $users = User::all();   

        // return view('dashboard', compact('clients', 'machines','users'));
    }

}
