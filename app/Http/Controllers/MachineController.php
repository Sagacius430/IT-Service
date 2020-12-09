<?php

namespace App\Http\Controllers;

use App\machine;
use Illuminate\Http\Request;
use App\Http\Requests\MachineRequest;
use Facade\FlareClient\Http\Machine as HttpMachine;
use PhpParser\Node\Stmt\TryCatch;


class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine = machine::all();

        return view('machine.index', compact('machine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            machine::create($request->all());
        } catch(\Exception $e){

            return redirect()->route('client.index')->withErrors();
        }

        return redirect()->route('client.index')->with('msg_success','Cadastrado!');

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
        $machine = machine::findOrFail($id);

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
        $machine = machine::findOrFail($id);

        $machine->update($request->all());
        $machine->save();

        return redirect()->route('client.index')->with('msg_success', 'Atualizado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = machine::findOrFail($id);

        $machine->delete();

        return redirect()->route('client.index');
    }
}
