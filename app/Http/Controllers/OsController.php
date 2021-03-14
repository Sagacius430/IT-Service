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

        return view('os.index', compact('orders', 'clients', 'users', 'counts', 'status', 'dateNow'));
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
        $machines = Machine::where('client_id', $client->id)->get();
        // $user = User::all();  
        $services = Service::all();

        return view('os.create', compact('client', 'machines', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->status;
        $order = new Os;
        
        $order->user_id = $request->user_id;
        $order->client_id = $request->client_id;
        $order->machine_id = $request->machine_id;
        $order->status = $request->status;
        $order->service_id = $request->service_id;

        // dd($order);

        $order->save();


        // DB::beginTransaction();

        // try {
            
        //     $order = new Os;
        //     $order->user_id = $request->user_id;
        //     $order->client_id = $request->client_id;
            
            
        //     foreach ($request->os as $data) {
        //         $order->machine_id = $data->machine_id;
        //     }
        //     return $order;

        //     DB::commit();
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     return back()->with('msg_error' . 'Erro no servidor ao cadastrar Ordem de Serviço');
        // }

        return redirect()
            ->route('os.index')
            ->with('msg_success', 'Cadastrado!'); // qual url que será redirecionada a msg
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
    public function edit($id)
    {
        $os = Os::findOrFail($id);
        $user = User::find($os->user_id);
        $client = Client::find($os->client_id);
        $machine = Machine::find($os->machine_id);
        $service = Service::find($os->service_id);
        $services = Service::all();
        
        return view('os.edit', compact('os', 'user', 'client', 'machine', 'service', 'services'));
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
        
        DB::beginTransaction();
        try{
            $order = Os::findOrFail($id);
            return $request;
            $order->update($request['os']);
            $order->update($request->procedures);
            return $order;
            // $order->update($request->all());

            DB::commit();
        }catch(\Exception $exception){

            DB::rollback();
            return back()
                ->with('msg_error','Erro no servidor ao atualizar oredem de serviço');
            
        }      

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

    // public function status(){

    //     $orders = Os::all();
    //     $clients = Client::all();

    //     return view('os.selected.status', compact('orders', 'clients'));
    // }
}
