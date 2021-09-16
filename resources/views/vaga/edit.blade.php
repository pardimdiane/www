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
                        <h2>Edite as informações da vaga</h2>        
                        <form method="POST" action="{{route('update_vaga', $vaga->id)}}">
                            @csrf
                            @method('PUT')
                            <label for="senha">Situação:</label>
                                <select name="situacao_id" class="form-control">
                                    <option selected disabled>Selecione uma opção</option>
                                    @foreach($situacaos as $situacao)
                                        <option value="{{ $situacao->id }}" @if($situacao->id == $vaga->situacao_id) selected @endif>{{ $situacao->situacao }}</option>
                                    @endforeach
                                </select>


                            <label for="area">Area:</label>
                            <select name="area_id" class="form-control" required>
                                <option selected disabled value="">Selecione uma opção</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}"@if($area->id == $vaga->area_id) selected @endif>{{ $area->area }}</option>
                                @endforeach
                            </select>


                            <label for="senha">Tipo da vaga:</label>
                            <select name="tipoVaga_id" class="form-control">
                                <option selected disabled>Selecione uma opção</option>
                                @foreach($tipovagas as $tipovaga)
                                    <option value="{{ $tipovaga->id }}" @if($tipovaga->id == $vaga->tipoVaga_id) selected @endif>{{$tipovaga->tipoVaga}}</option>
                                @endforeach
                            </select>
                            
                            
                            <label for="nome">Vaga:</label>
                            <input type="text" class="form-control" name="nome" required value="{{$vaga->nome}}" id="nome" aria-describedby="nomelHelp">

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descrição:</label>
                                <textarea maxlength='75' class="form-control" name="descricao" required id="descricao" rows="3">{{$vaga->descricao}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Requisitos:</label>
                                <textarea maxlength='75' class="form-control" name="requisitos" required  id="requisitos" rows="3">{{$vaga->requisitos}}</textarea>
                            </div>

                            <label for="salario">Salário:</label>
                            <input type="text" maxlength='10' class="form-control" name="salario" required value="{{$vaga->salario}}" id="salario" aria-describedby="nomelHelp">

                            <label for="nome">Contato para vaga:</label>
                            <input type="text" class="form-control" name="contatoVaga" required value="{{$vaga->contatoVaga}}" id="contatoVaga" aria-describedby="nomelHelp">
                            
                            <label for="nome">Local da vaga:</label>
                            <input type="text" class="form-control" name="local" required value="{{$vaga->local}}" id="local" aria-describedby="nomelHelp">
                            

                            

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