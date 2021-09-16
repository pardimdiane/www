<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipovaga;
use App\Empresa;
use App\Situacao;
use App\Vaga;
use App\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $vagas = DB::table('vagas')->get();

        $vagas = DB::table('vagas')
            ->join('tipovagas', 'tipovagas.id', '=', 'vagas.tipoVaga_id')
            ->join('empresas', 'empresas.id', '=', 'vagas.empresa_id')
            ->join('situacaos', 'situacaos.id', '=', 'vagas.situacao_id')
            ->join('areas', 'areas.id', '=', 'vagas.area_id')
            ->select('vagas.*','empresas.nomeFantasia', 'tipovagas.tipoVaga', 'situacaos.situacao', 'areas.area')
            ->orderBy('vagas.nome', 'asc')
            ->paginate(5);
        
        return view('vaga.vagas', ['vagas' => $vagas]);

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipovagas = TipoVaga::all();
        $empresas = Empresa::all();
        $situacaos = Situacao::all();
        $areas = Area::all();
          

       return view('vaga.create', compact('tipovagas', 'situacaos', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = Auth::user(); 
        $empresa = $usuario->empresas;
        $data = $request->all(); 
        $salario = (float) str_replace(",", ".", str_replace(".", "", $data['salario'])); //Converte 
        $vagas = $empresa->vagas()->create([
            "situacao_id" => $data['situacao_id'],
            "area_id" => $data['area_id'],
            "tipoVaga_id" => $data['tipoVaga_id'],
            "nome" => $data['nome'],
            "descricao" => $data['descricao'],
            "requisitos" => $data['requisitos'],
            "salario" => $salario, 
            "contatoVaga" => $data['contatoVaga'],
            "local" => $data['local'], 
            
        ]);
        
        //dd($empresa);
        return redirect()->route('minhasvagas');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vg)
    {
        $vagas = DB::table('vagas')->get();

        $vagas = DB::table('vagas')
            ->join('tipovagas', 'tipovagas.id', '=', 'vagas.tipoVaga_id')
            ->join('empresas', 'empresas.id', '=', 'vagas.empresa_id')
            ->join('users', 'users.id', '=', 'empresas.user_id')
            ->join('situacaos', 'situacaos.id', '=', 'vagas.situacao_id')
            ->join('areas', 'areas.id', '=', 'vagas.area_id')
            ->select('vagas.*','empresas.nomeFantasia', 'tipovagas.tipoVaga', 'situacaos.situacao', 'areas.area')
            ->where('users.id', auth()->user()->id)
            ->orderBy('vagas.nome', 'asc')
            ->paginate(5);
            

        return view('vaga.minhasvagas', compact('vagas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaga = Vaga::with(['tipovagas', 'situacaos'])->find($id); //with pega os dados relacionados no BD

        $tipovagas = TipoVaga::all();
        $empresas = Empresa::all();
        $situacaos = Situacao::all();
        $areas = Area::all();

        return view('vaga.edit', ["vaga"=>$vaga, "tipovagas"=>$tipovagas, "situacaos"=>$situacaos, "areas"=>$areas]);
        
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
        $vagas = Vaga::find($id);

        $usuario = Auth::user(); 
        $empresa = $usuario->empresas;
        $data = $request->all(); 
        $salario = (float) str_replace(",", ".", str_replace(".", "", $data['salario'])); //Converte
        $vagas = $vagas->update([
            "situacao_id" => $data['situacao_id'],
            "area_id" => $data['area_id'],
            "tipoVaga_id" => $data['tipoVaga_id'],
            "nome" => $data['nome'],
            "descricao" => $data['descricao'],
            "requisitos" => $data['requisitos'],
            "salario" => $salario, 
            "contatoVaga" => $data['contatoVaga'], 
            "local" => $data['local'],
        ]);
        
       
        return redirect()->route('minhasvagas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaga = Vaga::find($id);
        $vaga->delete();
        return redirect()->route('minhasvagas');
    }


    public function pesquisar(Request $request)
    {

        $tipovagas = TipoVaga::all();
        $empresas = Empresa::all();
        $situacaos = Situacao::all();
        $areas = Area::all();

       $pesquisar = request('pesquisar');
        
       $vagas = DB::table('vagas')
            ->join('tipovagas', 'tipovagas.id', '=', 'vagas.tipoVaga_id')
            ->join('empresas', 'empresas.id', '=', 'vagas.empresa_id')
            ->join('situacaos', 'situacaos.id', '=', 'vagas.situacao_id')
            ->join('areas', 'areas.id', '=', 'vagas.area_id')
            ->select('vagas.*','empresas.nomeFantasia', 'tipovagas.tipoVaga', 'situacaos.situacao', 'areas.area')
            ->where('vagas.nome', 'like', '%'.$pesquisar.'%')
            ->orWhere('vagas.local', 'like', '%'.$pesquisar.'%')
            ->orWhere('areas.area', 'like', '%'.$pesquisar.'%')
            ->orWhere('situacaos.situacao', 'like', '%'.$pesquisar.'%')
            ->orWhere('tipovagas.tipoVaga', 'like', '%'.$pesquisar.'%')
            ->orWhere('empresas.nomeFantasia', 'like', '%'.$pesquisar.'%')
            ->paginate(5);

            return view('vaga.vagas', ["vagas"=>$vagas, "pesquisar"=>$pesquisar]); //Passando para view
       
        /*$vgas = Vaga::where([
            ['nome', 'like', '%'.$pesquisar.'%']
        ])->get();*/

      
    }



    public function pesquisarMinhasVagas(Request $request)
    {

       $pesquisar = request('pesquisar');
        
       $vagas = DB::table('vagas')
            ->join('tipovagas', 'tipovagas.id', '=', 'vagas.tipoVaga_id')
            ->join('empresas', 'empresas.id', '=', 'vagas.empresa_id')
            ->join('users', 'users.id', '=', 'empresas.user_id')
            ->join('situacaos', 'situacaos.id', '=', 'vagas.situacao_id')
            ->join('areas', 'areas.id', '=', 'vagas.area_id')
            ->select('vagas.*','empresas.nomeFantasia', 'tipovagas.tipoVaga', 'situacaos.situacao', 'areas.area')
            ->where('users.id', auth()->user()->id)
            ->where(function ($query) use ($pesquisar) {
                $query->where('vagas.nome', 'like', '%'.$pesquisar.'%')
                      ->orWhere('vagas.local', 'like', '%'.$pesquisar.'%')
                      ->orWhere('areas.area', 'like', '%'.$pesquisar.'%')
                      ->orWhere('situacaos.situacao', 'like', '%'.$pesquisar.'%')
                      ->orWhere('tipovagas.tipoVaga', 'like', '%'.$pesquisar.'%')
                      ->orWhere('empresas.nomeFantasia', 'like', '%'.$pesquisar.'%');
            })
            ->paginate(5);

            return view('vaga.minhasvagas', ["vagas"=>$vagas, "pesquisar"=>$pesquisar]); //Passando para view
       
        /*$vgas = Vaga::where([
            ['nome', 'like', '%'.$pesquisar.'%']
        ])->get();*/

      
    }
}
