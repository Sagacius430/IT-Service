<?php

namespace App\Http\Controllers;

use App\{Address, Machine, Client};
use App\Http\Requests\{ClientRequest, ExportRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientImport;
use App\Exports\ClientExport;
use Carbon\Carbon;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =  Client::paginate(5);
        
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
    public function store(CLientRequest $request)
    {
        // $clientId = $request->all();
        // $client = Client::create($clientId);

        // $clientId['id'] = $client->id;
        // Machine::create($clientId);
            // return $request;
        DB::beginTransaction();

        try{
            // Client é o model            
            $client = Client::create($request['client']);
            
            //copiando o id do cliente no endereço
            $client->address()->create($request['address']);             
            
            foreach ($request->machines as $machine){  

                $client->machines()->create($machine);                
            
            }
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
    public function edit($id)//usa o id caso não esteja usando rotas resoures
    {        
        $client = Client::findOrFail($id);

        // $client_id = $client->id;
        // $machines = Machine::all(); 
        // foreach($machines as $machine){
        //     $machine = Machine::findOrFail($client_id);            
        // }
        
                                    //compact envia a variável 'client' para view
        return view('clients.edit', compact('client'));
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
        
        DB::beginTransaction();
        try{ 

            $client = Client::findOrFail($id);
            //atualizando o CLiente
            $client->update($request['client']);

            //atualizando o endereço
            $client->address()->update($request['address']);

            //atualizando os computadores
            foreach($request->machines as $machine){
                $machineClient = $client->machines()->where('id', $machine['id']);
                
                $machineClient->update([
                    'machine_type'  => $machine['machine_type'],
                    'brand'         => $machine['brand'],
                    'model'         => $machine['model'],
                    'serial_number' => $machine['serial_number'],
                    'description'   => $machine['description'],
                    'breakdowns'    => $machine['breakdowns']
                ]);
            }
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
        try{
            $client = Client::findOrFail($id);
            $client->address()->delete();
            // $client->machine()->delete();
            $machines = Machine::all();
            foreach($machines as $machine){
                if ($machine->client_id == $id) {
                    $machine->delete();
                }
            }

            // foreach($address as $data){
            //     if($data->client_id == $client->id){
            //         $address->delete();
            //     }
            // }

            $client->delete();
            // $client->address()->delete;
        }catch(\Exception $exception){

            DB::rollback();
            return back()
                ->with('msg_error','Erro no servidor ao excluir cliente');
            
        }        

        return redirect()
            ->route('clients.index')
            ->with('msg_success', 'Cliente deletado');
    }

    public function import(Request $request){
        
        $file = $request->files->get('file');
        
        try{

        Excel::import(new ClientImport, $file);
        
        
        } catch(\Exception $exception){

            return back()->with('msg_error', 'Erro ao importar');

        }

        return back()->with('msg_success', 'Importação realizada');
    }

    // public function export(){

    //     return Excel::download(new ClientExport, 'Clients.csv');

    // }

    public function export(Request $request){
       
        $dateStart = Carbon::parse(date('yy-m-d', strtotime($request->date_start)))->startOfDay();
        $dateEnd = Carbon::parse(date('yy-m-d', strtotime($request->date_end)))->startOfDay();
        
        if($dateStart >= '2020-01-12'){
            $dateStart = Carbon::parse('2020-01-12T00:00:00.000000Z');
        }       
        

        if($dateEnd >= '2020-01-12'){
            $dateEnd = Carbon::now();
        }
        
        $exportFileType = $request->export_file_type;
        
        
        return Excel::download( new clientExport($dateStart, $dateEnd), 'Clients.'.$exportFileType);

    }
}
