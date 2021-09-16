@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
         @endif
        <div class="col-md-12">
            <div class="jumbotron">
                <div class="row w-100">
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-building" aria-hidden="true"></span></div>
                                <div class="text-info text-center mt-3"><h4>Empresa</h4></div>
                                <a href="{{ URL::action('EmpresaController@create')}}" class="btn btn-outline-secondary">Cadastrar</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info shadow text-info p-3 my-card"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                                <div class="text-info text-center mt-3"><h4>Publicar vaga</h4></div>
                                <a href="{{ URL::action('VagaController@create')}}" class="btn btn-outline-secondary">Publicar</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-list" aria-hidden="true"></span></div>
                                <div class="text-info text-center mt-3"><h4>Minhas vagas</h4></div>
                                <a href="{{ route('minhasvagas') }}" class="btn btn-outline-secondary">Acessar</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-user" aria-hidden="true"></span></div>
                                <div class="text-info text-center mt-3"><h4>Perfil</h4></div>
                                <a href="{{ route('perfil') }}" class="btn btn-outline-secondary">Editar</a>
                            </div>
                        </div>
                     </div>
                </div>
          
            </div>
        </div>
    </div>
</div>
@endsection
