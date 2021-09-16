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
                        <h2>Cadastre suas informações</h2>
                        <form method="POST" action="{{ route('store_emp') }}">
                            @csrf
                            <label for="nome">Nome (Razão Social):</label>
                            <input type="text" class="form-control" name="nomeFantasia" id="nomeFantasia" aria-describedby="nomelHelp" required="">

                            <label for="nome">Telefone:</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="nomelHelp" placeholder="(00)0000-0000">

                            <label for="celular">Celular (WhatsApp):</label>
                            <input type="text" class="form-control" name="celular" id="celular" aria-describedby="emailHelp" placeholder="(00)00000-0000">

                            <label for="email">CNPJ:</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" aria-describedby="emailHelp" placeholder="00.000.000/0000-00">
                        
                            <label for="nome">Estado:</label>
                            <input type="text" class="form-control" name="estado" id="estado" aria-describedby="nomelHelp">

                            <label for="nome">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" aria-describedby="nomelHelp">

                            <label for="nome">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" aria-describedby="nomelHelp">

                            <label for="nome">Rua:</label>
                            <input type="text" class="form-control" name="rua" id="rua" aria-describedby="nomelHelp">

                            <label for="nome">Número:</label>
                            <input type="text" class="form-control" name="numero" id="numero" aria-describedby="nomelHelp">

                            <div class="form-group">
                            
                            </div>

                            <p class="text-center"> 
                                <button type="submit" class="btn btn-outline-success">
                                    Cadastrar  
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