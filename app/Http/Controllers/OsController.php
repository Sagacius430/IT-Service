<?php

namespace App\Http\Controllers;

use App\{Os, Client, Machine, Service, User};
use Illuminate\Http\Request;
use App\Http\Requests\OsRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =  Os::all(); 
        $clients = Client::all(); 
        $users = User::all();

        $counts = [
            
            'clients'  => Client::count(),
            'users'    => User::count(),
            'services' => Service::count(),
            'machines' => Machine::count(),
            'os'       => Os::count(),

        ];
        //Select ordem de serviço pra enviar a index
        $status = [
            'em_manutenção'   => Os::where('status', 'Em manutenção')->count(),
            'aguardando_peça' => Os::where('status', 'Aguardando peça')->count(),
            'devolvido'       => Os::where('status', 'Devolvido')->count(),
            'finalizado'      => Os::where('status', 'Finalizado')->count(),
        ];

        $collection = collect(['','']);

        $counted = Machine::where('brand', '!=', null)->count();  

        return view('os.index', compact('orders','clients', 'users','counts','status','counted'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id)
    {
        $client = Client::find($client_id);
        // dd($client);        
        $machines = Machine::where('client_id', $client_id)->get();
        $user = User::all();  
        $services = Service::all();    

        return view('os.create', compact('client','machines','user', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {              
        $orderService = Os::create($request['os']);
            return $orderService;
        // return $request->input();
        //O store não está funcionando. Verificar
        DB::beginTransaction();

        try{
            
            
            // $input = $request->only(['client_id', 'user_id']);
            $client = Client::findOrFail($request->client['id']);
            $orderService = OS:: create([                
                'user_id'       => auth()->user()->id,
                'client_id'     => $client->id,
                'machine_id'    => $request->machine_id,
                'status'        => $request->status,
                'service'       => $request->service,
            ]);
            // $orderService -> machine_id = $request->machine_id;
            // $orderService -> status = $request->status;
            // $orderService -> service = $request->service;
            foreach ($request->services as $service){
                $orderService->services()->attach($service['id']);
            }
            return $orderService->services;
            
            DB::commit();

        } catch(\Exception $e){
            DB::rollback();
            return back()->with('msg_error'. 'Erro no servidor ao cadastrar Ordem de Serviço');
        }               
        
        return redirect()
            ->route('os.index')
            ->with('msg_success','Cadastrado!');// qual url que será redirecionada a msg
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function show(Os $os)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function edit(Os $id)
    {
        
        $order = Os::findOrFail($id);
        
        return view('os.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Os $os)
    {
        $os->update($request['os']);
        return redirect()
            ->route('os.index')
            ->with('msg_success', 'Orden de serviço atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function destroy(Os $os)
    {
        //
    }
}
