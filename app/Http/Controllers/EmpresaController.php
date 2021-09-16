<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\User;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empresa $emp){
        //$empresas = $emp->all();
        $empresas = $emp->where('user_id', auth()->user()->id)->get();//user logado
       
        return view('empresa.listaEmp', compact('empresas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user(); 
        $data = $request->all();
        $empresas = $user->empresas()->create([
            "nomeFantasia" => $data['nomeFantasia'],
            "telefone" => $data['telefone'],
            "celular" => $data['celular'],
            "cnpj" => $data['cnpj'],
            "estado" => $data['estado'],
            "cidade" => $data['cidade'],
            "bairro" => $data['bairro'],
            "rua" => $data['rua'],
            "numero" => $data['numero']

        ]);
       
        return redirect()->route('perfil');
        
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
        return view('empresa.edit', ["empresa"=>Empresa::find($id)]);
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
        $empresas = Empresa::find($id);

        $user = Auth::user(); 
        $data = $request->all();
        $empresas = $user->empresas()->update([
            "nomeFantasia" => $data['nomeFantasia'],
            "telefone" => $data['telefone'],
            "celular" => $data['celular'],
            "cnpj" => $data['cnpj'],
            "estado" => $data['estado'],
            "cidade" => $data['cidade'],
            "bairro" => $data['bairro'],
            "rua" => $data['rua'],
            "numero" => $data['numero']

        ]);
       
        return redirect()->route('perfil');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        return redirect()->route('perfil');

        
    }
}
