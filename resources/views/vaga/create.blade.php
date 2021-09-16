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
                        <h2>Cadastre as informações da vaga</h2>        
                        <form method="POST" action="{{ route('store_vaga')}}">
                            @csrf

                            <label for="senha">Situação:</label>
                            <select name="situacao_id" class="form-control" required>
                                <option selected disabled value="">Selecione uma opção</option>
                                @foreach($situacaos as $situacao)
                                    <option value="{{ $situacao->id }}">{{ $situacao->situacao }}</option>
                                @endforeach
                            </select>

                            <label for="area">Área:</label>
                            <select name="area_id" class="form-control" required>
                                <option selected disabled value="">Selecione uma opção</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach
                            </select>
                            
                            <label for="senha">Tipo da vaga:</label>
                            <select name="tipoVaga_id" class="form-control" required>
                                <option selected disabled value="">Selecione uma opção</option>
                                @foreach($tipovagas as $tipovaga)
                                    <option value="{{ $tipovaga->id }}">{{$tipovaga->tipoVaga}}</option>
                                @endforeach
                            </select>
                            
                            
                            <label for="nome">Vaga:</label>
                            <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomelHelp" required="" pattern="[a-zA-Z\s]+$" title="O campo nome não pode conter números">

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição:</label>
                                <textarea maxlength='75' class="form-control" name="descricao" id="descricao" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Requisitos:</label>
                                <textarea maxlength='75' class="form-control" name="requisitos" id="requisitos" rows="3"></textarea>
                            </div>

                            <label for="nome">Salário:</label>
                            <input type="text" maxlength='10' class="form-control" name="salario" id="salario" aria-describedby="nomelHelp">

                            <label for="nome">Contato para vaga (WhatsApp):</label>
                            <input type="text" class="form-control" name="contatoVaga" id="contatoVaga" aria-describedby="nomelHelp" placeholder="(00)00000-0000">

                            <label for="nome">Local da vaga:</label>
                            <input type="text" class="form-control" name="local" id="local" aria-describedby="nomelHelp">


                            

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