@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::action('HomeController@index')}}" class="btn btn-outline-secondary">Voltar</a> 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <h2>Edite suas informações</h2>
                        <form method="post" action="{{route('update_emp', $empresa->id)}}">
                            @csrf
                            @method('PUT')
                            <label for="nome">Nome (Razão Social):</label>
                            <input type="text" class="form-control" name="nomeFantasia" required value="{{$empresa->nomeFantasia}}" id="nomeFantasia" aria-describedby="nomelHelp">

                            <label for="nome">Telefone:</label>
                            <input type="text" class="form-control" name="telefone" required value="{{$empresa->telefone}}" id="telefone" aria-describedby="nomelHelp">

                            <label for="celular">Celular (WhatsApp):</label>
                            <input type="text" class="form-control" name="celular" required value="{{$empresa->celular}}" id="celular" aria-describedby="emailHelp">

                            <label for="email">CNPJ:</label>
                            <input type="text" class="form-control" name="cnpj" required value="{{$empresa->cnpj}}" id="cnpj" aria-describedby="emailHelp">
                        
                            <label for="nome">Estado:</label>
                            <input type="text" class="form-control" name="estado" required value="{{$empresa->estado}}" id="estado" aria-describedby="nomelHelp">

                            <label for="nome">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" required value="{{$empresa->cidade}}" id="cidade" aria-describedby="nomelHelp">

                            <label for="nome">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" required value="{{$empresa->bairro}}" id="bairro" aria-describedby="nomelHelp">

                            <label for="nome">Rua:</label>
                            <input type="text" class="form-control" name="rua" required value="{{$empresa->rua}}" id="rua" aria-describedby="nomelHelp">

                            <label for="nome">Número:</label>
                            <input type="text" class="form-control" name="numero" required value="{{$empresa->numero}}" id="numero" aria-describedby="nomelHelp">

                            <div class="form-group">
                            
                            </div>

                            <p class="text-center"> 
                                <button type="submit" class="btn btn-outline-primary">
                                    Salvar  
                                </button>
                            </p>
                        
                        </form>


                            
                        
                       
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection