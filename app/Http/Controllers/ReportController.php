<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Client, Os, User};
use App\Machine;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;

class ReportController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateClientsReport(Request $request)
    {
        $clients = new Client;        

        //selecionar intervalo de data
        if ($request->date_start != '') {
            $dateStart = Carbon::parse($request->date_start)->startOfDay();
            $clients = $clients->where('created_at', '>=', $dateStart);
        }

        if ($request->date_end != '') {
            $dateEnd = Carbon::parse($request->date_end)->endOfDay();
            $clients = $clients->where('created_at', '<=', $dateEnd);
        }

        $clients = $clients->get();
        $machines = new Machine;

        return view('reports.clients', compact('clients','machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateOsReport(Request $request)
    {
        $os = new Os;  
        $clients = new Client;  
        $users = new User;    

        //selecionar intervalo de data
        if ($request->date_start != '') {
            $dateStart = Carbon::parse($request->date_start)->startOfDay();
            $os = $os->where('created_at', '>=', $dateStart);
        }

        if ($request->date_end != '') {
            $dateEnd = Carbon::parse($request->date_end)->endOfDay();
            $os = $os->where('created_at', '<=', $dateEnd);
        }

        $os      = $os->get();
        $clients = $clients->get();
        $users   = $users->get();

        return view('reports.os', compact('os', 'clients', 'users'));
    }
}