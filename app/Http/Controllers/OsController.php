<?php

namespace App\Http\Controllers;

use App\{Client,Machine,User};
use App\Os;
use Illuminate\Http\Request;
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
        $os =  Os::all();   

        return view('os.index', compact('os'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $clients = Client::all();
        $machines = Machine::all();
        $users = User::all();      

        return view('os.create', compact('clients','machines','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //O store não está funcionando. Verificar
        DB::beginTransaction();

        try{

            $client = Client::findOrFail($request->client['id']);
            // $user = auth()->user()->id //pegar o usuário locado; 
            $machines = Machine::all();
            $return_date = Carbon::now()->addMonth(3)->format('Y-m-d');
            

            return compact('$client', '$user', '$machines','$return_date');
                    

        //     DB::commit();

        } catch(\Exception $exception){
            DB::rollback();
            return back()->with('msg_error'. 'Erro no servidor ao cadastrar Ordem de Serviço');
        }               
        
        // return redirect()
        //     ->route('clients.index')
        //     ->with('msg_success','Cadastrado!');// qual url que será redirecionada a msg
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
    public function edit(Os $os)
    {
        //
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
        //
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
