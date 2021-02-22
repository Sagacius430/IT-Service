<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{client,machine, Service, User, OS};
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
            'services' => Service::count(),
            'machines' => Machine::count(),
            'os'       => Os::count(),

        ];

        
        
        
        return view('dashboard', compact('counts'));        
    }

}
