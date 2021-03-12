<?php

namespace App\Http\Controllers;

use App\{Os, Client, Machine, Service, User};
use Illuminate\Http\Request;
use App\Http\Requests\OsRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

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
        

        // $creationDate = Carbon::createFromFormat('Y-m-d', '1999-01-01');
        $dateNow = Carbon::now();

        // $time = $dateNow->diffInDays($creationDate); 

        // $creationDate = Carbon::createFromFormat('y-m-d', '1999-01-01');//->format('Y-m-d');
        // $dateNow = Carbon::createFromFormat('y-m-d', '2000-01-01');

        // $time = $dateNow->diffInDays($creationDate); // saída: 365 dias

        
        // $date = Carbon::createFromFormat('m/d/Y', $myDate)->format('Y-m-d');

        $counts = [
            
            'clients'  => Client::count(),
            'users'    => User::count(),
            'services' => Service::count(),
            'machines' => Machine::count(),
            'os'       => Os::count(),

        ];
        //Select ordem de serviço pra enviar a index
        $status = [
            'aguardando'      => Os::where('status', 'Aguardando Serviço')->count(),
            'em_manutenção'   => Os::where('status', 'Em manutenção')->count(),
            'aguardando_peça' => Os::where('status', 'Aguardando peça')->count(),
            'devolvido'       => Os::where('status', 'Devolvido')->count(),
            'finalizado'      => Os::where('status', 'Finalizado')->count(),
            'em_garantia'     => Os::where('guarantee', '!=', '')->count(),
        ];

        //se a data de garantia for igual ou maior que hoje, recebe null
        // if($status('guarantee') >= now()){

        //     $guarantee = Os::findOrFail($status('guarantee'));
        //     $guarantee->guarantee = null;       
        //     $guarantee->save();
           
        // }
        
        // //Teste
        // $collection = collect(['','']);

        // $counted = Machine::where('brand', '!=', null)->count();  

        return view('os.index', compact('orders','clients', 'users','counts','status','dateNow'));  
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
        // $user = User::all();  
        $services = Service::all(); 

        return view('os.create', compact('client','machines', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){  
        
        $orderService = new Os;
        $orderService -> user_id    = (string)$request->user_id;
        $orderService -> client_id  = (string)$request->client_id;
        $orderService -> machine_id = $request->machine_id;
        $orderService -> status     = (string)$request->status;
        $orderService -> service_id = (string)$request->service_id;
        // $orderService -> service    = (string)$request->service;
        return $orderService;
        $orderService->save();
        
        return redirect()
            ->route('os.index')
            ->with('msg_success','Cadastrado!');
        // return $orderService->services;
        
        // return $request->input();
        //O store não está funcionando. Verificar
        // DB::beginTransaction();

        // try{          
            
            // $input = $request->only(['client_id', 'user_id']);
            // $client  = Client::findOrFail($request->client['id']);
            // $machine = Machine::findOrFail($request->machine['id']);
            // $service = Service::findOrFail($request->service['id']);

            $client = Client::all();
            $machine = Machine::all();
            $service = Service::all();
            
            $orderService = OS:: create([                
                'user_id'       => auth()->user()->id,
                'client_id'     => $request->client_id,
                // 'machine_id'    => $request->machine_id,
                'machine_id'    => $request->machine_id,
                'status'        => $request->status,
                'service_id'    => $request->service,
                // 'return_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            ]);

            // foreach ($request->services as $service){
            //     $orderService->services()->attach($service['id']);
            // }           
            
            
        //     DB::commit();

        // } catch(\Exception $exception){
        //     DB::rollback();
        //     return back()->with('msg_error'. 'Erro no servidor ao cadastrar Ordem de Serviço');
        // }               
        
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
        try{
            $teste = (string)$id;
            $order = Os::findOrFail($id);
            return $teste;
            // //se o status for finalizado o finish recebe a data de agora
            // if ($order['status'] == 'finalizado') {
            //     $order->finish()->now();
            // }
        }catch(\Exception $exception){
            return back()->with('msg_error'. 'Erro no servidor ao editar Ordem de Serviço');
        };
     
        return view('os.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Os  $os
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $os = Os::findOrFail($id);

        // $os->update($request[$id]);

        $os->update($request->all());

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
