<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Client, Os, User, Machine};
use Carbon\Carbon;

class ReportController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateClientsReport(Request $request)
    {
        $clients = new  Client;
        $machines = new Machine;

        $dateStart = Carbon::parse($request->date_start)->startOfDay();
        $dateEnd = Carbon::parse($request->date_end)->endOfDay();

        //selecionar intervalo de data
        if (strtotime($request->date_start) > strtotime($request->date_end)) {

            return back()->with('msg_error', 'Data inicial maior que data final para o relatório de clientes.');
        } else {

            //selecionar intervalo de data
            if ($request->date_start != '') {

                $clients = $clients->where('created_at', '>=', $dateStart);
            } else {

                $dateStartSystem = Carbon::parse('2020-01-12T00:00:00.000000Z');
                $clients = $clients->where('created_at', '>=', $dateStartSystem);
            }

            if ($request->date_end != '') {

                $clients = $clients->where('created_at', '<=', $dateEnd);
            } else {

                $dateNow = Carbon::now();
                $clients = $clients->where('created_at', '<=', $dateNow);
            }
        }

        $clients = $clients->get();
        $machines = $machines->get();

        return view('reports.clients', compact('clients', 'machines'));
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


        $dateStart = Carbon::parse($request->date_start)->startOfDay();
        $dateEnd = Carbon::parse($request->date_end)->endOfDay();

        if (strtotime($request->date_start) > strtotime($request->date_end)) {

            return back()->with('msg_error', 'Data inicial maior que data final para o relatório de ordem de serviço.');
        } else {
            //selecionar intervalo de data
            if ($request->date_start != '') {

                $os = $os->where('created_at', '>=', $dateStart);
            } else {

                $dateStartSystem = Carbon::parse('2020-01-12T00:00:00.000000Z');
                $os = $os->where('created_at', '>=', $dateStartSystem);
            }

            if ($request->date_end != '') {

                $os = $os->where('created_at', '<=', $dateEnd);
            } else {

                $dateNow = Carbon::now();
                $os = $os->where('created_at', '<=', $dateNow);
            }
        }


        $os      = $os->get();
        $clients = $clients->get();
        $users   = $users->get();

        return view('reports.os', compact('os', 'clients', 'users'));
    }
}
