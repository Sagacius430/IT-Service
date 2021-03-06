<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as AuthUser;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(5);
        // $user = $users;
        // $user::find('$name');        
        // $user::where('name',1)
        //     ->orderBy('created_at')->take(10)->get();
        // $user= new User;
        // $user->name = $request->name ;

        return view('users.index', compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {        
        //cadastrar os dasdos que estão vindo da requisição
        User::create($request->all());

        // DB::beginTransaction();
        // try{
            // $user = User::create($request['user']);

        //     DB::commit();

        // }catch(\Exception $exception){

        //     DB::rollback();
        //     return back()->with('msg_error', 'Erro no servidor ao cadastrar');

        // }

        return redirect()
            ->route('users.index')
            ->with('msg_success','Cadastrado!');
        
        
        // User::create($request->all());        

        // return redirect()
        //     ->route('users.index')
        //     ->with('msg_success','Cadastrado!');
        
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
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // return $request;
        DB::beginTransaction();
        try{ 

            $user = User::findOrFail($id);            
            
            $user->update($request->all());

            DB::commit();

        } Catch(\Exception $exception){

            DB::rollback();
            return back()
                ->with('msg_error','Erro no servidor ao atualizar usuário');
            
        }

        // $user = User::findOrFail($id);

        // $user->update($request->all());
        // $user->save();

        return redirect()
            ->route('users.index')
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
        try{
            $user = User::findOrFail($id);
            $user->delete();
        }Catch(\Exception $exception){
            DB::rollback();
            return back()
                ->with('msg_error','Erro no servidor ao excluir usuário');
        }
        
        return redirect()
            ->route('users.index')
            ->with('msg_success', 'Usuário excluido!');
    }
}
