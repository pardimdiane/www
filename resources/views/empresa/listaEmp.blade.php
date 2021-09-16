@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="text-align: justify;">
            <div class="card">
                <div class="card-header">{{ __('Boas Vindas!') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    @foreach ($empresas as $empresa)
                        <div class="row">
                            <div class="col-md-6" style="padding: 10px;">
                                <a href="{{route('edit_emp', ['id' => $empresa->id]) }}" 
                                class="btn btn-outline-info btn-sm" style="width:100%;">Editar minhas informações</a>
                            </div>
                            <div class="col-md-6" style="padding: 10px;">        
                                <a href="" data-target="#modal-delete-{{$empresa->id}}" data-toggle="modal">
                                    <button type="submit" class="btn btn-outline-danger btn-sm" style="width:100%;">Excluir perfil</button>
                                </a>
                                
                            </div>
                        </div>  
                             
                      
        
                        <h3>{{$empresa->nomeFantasia}}</h3>
                        <p><strong>Telefone:</strong> {{$empresa->telefone}}</p>
                        <p><strong>Celular:</strong> {{$empresa->celular}}</p>
                        <p><strong>CNPJ:</strong> {{$empresa->cnpj}}</p>
                        <p><strong>Estado:</strong> {{$empresa->estado}}</p>
                        <p><strong>Cidade:</strong> {{$empresa->cidade}}</p>
                        <p><strong>Bairro:</strong> {{$empresa->bairro}}</p>
                        <p><strong>Rua:</strong> {{$empresa->rua}}</p>
                        <p><strong>Num:</strong> {{$empresa->numero}}</p>
                    @endforeach
                </div>

                
            </div>
        </div>
    </div>
</div>

    @foreach ($empresas as $empresa)
        @include('empresa.modalExcluir')
        
    @endforeach

@endsection
