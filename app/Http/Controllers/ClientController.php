<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\client;
use Facade\FlareClient\Http\Client as HttpClient;
use PhpParser\Node\Stmt\TryCatch;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients =  client::all();

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
        // $client = new client;
        // //if(!empty($client))
        // //{   
        //     //insere na base de dados
        //     $client->name = $request->name;
        //     $client->fone = $request->fone;
        //     $client->machine_type = $request->machine_type;
        //     $client->description = $request->description;
        //     $client->breakdowns = $request->breakdowns;
        //     $client->save();
        
        //     //return $request;
        // //}
        //Client é o model
       
        try {

            Client::create($request->all());

        } catch(\Exception $e){

            return redirect()->route('clients.index')->withErrors();

        }

        return redirect()->route('clients.index')->with('msg_success','Cadastrado!');// qual url que será redirecionada a msg
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
    public function edit($id)
    {
        $client = client::findOrFail($id); // buscar pelo ID
                                    //compact envia a viariável 'client' para view
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
        $client = client::findOrFail($id);

        // $client->name = $request->name;
        // $client->fone = $request->fone;
        // $client->machine_type = $request->machine_type;
        // $client->description = $request->description;
        // $client->breakdowns = $request->breakdowns;
        $client->update($request->all());
        $client->save();

        return redirect()->route('clients.index')->with('msg_success','Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::findOrFail($id);

        $client->delete();

        return redirect()->route('clients.index');
    }
}
