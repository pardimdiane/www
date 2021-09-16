@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center activity">
                <div><span class="activity-done">Vagas</span></div>
             
                <div class="site-heading">      
                    <div class="input-group">
                        <div class="form-outline">
                            <form action="{{ route('pesquisar_vaga') }}" method="GET" class="form form-inline">    
                                <input class="form-control mr-2" name="pesquisar" type="search" placeholder="Pesquise a vaga aqui" aria-label="Search">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i><span>buscar</span></button>
                            </form>
                        </div>          
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <ul class="list list-inline">
                    @foreach ($vagas as $vaga)
                    <li class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center"><i class="fa fa-check-circle checkicon"></i>
                            <div class="ml-3">
                                <h5 class="mb-0">{{$vaga->nome}}</h5>
                                <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                    <div class="ml-3"></i><span class="ml-2">{{$vaga->nomeFantasia}}</span></div>
                                    <div><span class="ml-2">R$ {{ number_format($vaga->salario, 2, ',', '.') }}</span></div>
                                    <div class="ml-3"></i><span class="ml-2">{{$vaga->tipoVaga}}</span></div>
                                    <div class="ml-3"><span class="ml-2">{{$vaga->area}}</span></div>
                                    <div class="ml-3"></i><span class="ml-2">{{$vaga->situacao}}</span></div>  
                                    <div class="ml-3"><i class="fa fa-phone"></i><span class="ml-2">{{$vaga->contatoVaga}}</span></div>
                                    <div class="ml-3"><span class="ml-2">{{$vaga->local}}</span></div>
                                </div>
                                <h6 class="mb-0 mt-2"><strong>Funções: </strong> {{$vaga->descricao}}</h6>
                                <h6 class="mb-0 mt-2"><strong>Requisitos: </strong> {{$vaga->requisitos}}</h6>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer">
                @if (isset($pesquisar))
                    {!! $vagas->appends($pesquisar)->links() !!}
                @else
                    {!! $vagas->links() !!}
                @endif       
            </div>
        </div>
    </div>
</div>


@endsection