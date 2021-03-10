<?php

namespace App\Http\Controllers;

use App\{Machine, CLient};
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
    public function store(ClientRequest $request)
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
            
            foreach ($request->machines as $machine){  
                //**Esta cadastrando somente se for dois computadores.
                //**verificar permissão para cadastrar um tbm
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
        

        if($request->dateStart == '2020-01-01'){
            $dateStart = Carbon::parse('1982-06-09');
        }       

        if($request->dateEnd == ''){
            $dateEnd = Carbon::now();
        }

        $dateStart = Carbon::parse($request->date_start)->startOfDay();
        $dateEnd = Carbon::parse($request->date_end)->endOfDay();
        $exportFileType = $request->export_file_type;
        
        
        

        // dd($dateStart);

        return Excel::download( new clientExport($dateStart, $dateEnd), 'Clients.'.$exportFileType);

    }
}
