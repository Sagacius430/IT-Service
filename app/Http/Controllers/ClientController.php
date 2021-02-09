<?php

namespace App\Http\Controllers;

use App\{Machine, CLient};
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

use function GuzzleHttp\Promise\all;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =  Client::all();
        
        return view('clients.index', compact('clients'));  
        //return view('client');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $clientId = $request->all();
        // $client = Client::create($clientId);

        // $clientId['id'] = $client->id;
        // Machine::create($clientId);
        
        DB::beginTransaction();

        try{
            // Client é o model            
            $client = Client::create($request['client']);
            
            //copiando o id do cliente no endereço
            $client->address()->create($request['address']); 
            
            // $machine = Machine::create($request['machine']);
            // $client = $machine;
            // //parei aqui
            // return $request;
            foreach ($request->machines as $machine){  
                // machine() para muitos em Model Client
                // machine para um em Model Client
                $client->machines()->create($machine);                
            }
            
            return ;
            DB::commit();

        } catch(\Exception $exception){
            DB::rollback();
            return back()->with('msg_error'. 'Erro no servidor ao cadastrar cliente');
        }               
        
        return redirect()
            ->route('clients.index')
            ->with('msg_success','Cadastrado!');// qual url que será redirecionada a msg
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Machine $machine)
    {
        // $client = Client::findOrFail($id); // buscar pelo ID
        // $machines = Machine::all(); 
        // foreach($machines as $machine){
            // $machines = $client->machine()->where('id', $machine['id']);
        // }
                                    //compact envia a variável 'client' para view
        return view('clients.edit', compact('client', 'machine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {                     
        DB::beginTransaction();
        try{ 
            //atualizando o CLiente
            $client->update($request['client']);

            //atualizando o endereço
            $client->address()->update($request['address']);

            // $client->machines()->update($request['machine']);

            DB::commit();

        } catch(\Exception $exception){

            DB::rollback();
            return back()
                ->with('msg_error','Erro no servidor ao atualizar cliente');
            
        }
            return redirect()
                ->route('clients.index')
                ->with('msg_success', 'Cliente atualizado');

        // // return $request;
        // $client = Client::findOrFail($id);

        // $client->update($request->all());
        // $client->save();

        // return redirect()
        //     ->route('clients.index')
        //     ->with('msg_success','Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $client->delete();
        // $client->address()->delete;

        return redirect()
            ->route('clients.index');
    }
}
