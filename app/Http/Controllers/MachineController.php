<?php

namespace App\Http\Controllers;

use App\client;
use App\Http\Requests\ClientRequest;
use App\Machine;
use Illuminate\Http\Request;
use App\Http\Requests\MachineRequest;
use Facade\FlareClient\Http\Client as HttpClient;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\DB;


class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {        
        $nome = Client::get('nome');
        $id   = $id;
        $machines = Machine::find(1);
                                    //o compact envia a variável $machines para view
        return view('clients.edit', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $machines = Machine::all();        

        return view('machines.create', compact('machines', 'client'));
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        //parei aqui
        $url = $request->query();//teste
        return $url;


        // DB::beginTransaction();

        // try{
            // Machine::created(['client_id' => $request(Client::find(12))]);
            Machine::create($request['machine']);
           
            // if('$machine')

            return $request->all();


            // $machine->client()->create($request['client']);

            // foreach($request->machines as $machine){
            //     $machine->machines()->create($machine);
            // }

        //     DB::commit();

        // } catch{

        //     DB::rolback();
        //     return back()->with('msg_error', 'Erro no servidor ao cadastrar dispositivo.');

        // }

        // machine::create($request->all());        

        return redirect()
            ->route('machines.create')
            ->with('msg_success','Cadastrado!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('clients.edit', ['machine' => Machine::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machine::findOrFail($id);
       
        return view('client.edit', compact('machine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $machine = Machine::findOrFail($id);

        $machine->update($request->all());
        $machine->save();

        return redirect()
            ->route('client.index')
            ->with('msg_success', 'Atualizado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);

        $machine->delete();

        return redirect()
            ->route('client.index');
    }
}
