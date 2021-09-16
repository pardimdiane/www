@extends('layouts.app2')

@section('content')



<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center activity">
                <div><span class="activity-done">Suas Vagas</span>
                    <a class="p-2" href="{{ URL::action('VagaController@create')}}">
                        <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>
                    </a>
                </div>
                    
                
                <div class="site-heading">      
                    <div class="input-group">
                        <div class="form-outline">
                            <form action="{{ route('pesquisar_minhasvagas') }}" method="GET" class="form form-inline">    
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
                                <h6 class="mb-0">{{$vaga->nome}}</h6>
                                <div class="d-flex flex-row mt-1 text-black-50 date-time">
                                    <div><span class="ml-2">R$ {{ number_format($vaga->salario, 2, ',', '.') }}</span></div>
                                    <div class="ml-3"><span class="ml-2">{{$vaga->tipoVaga}}</span></div>
                                    <div class="ml-3"><span class="ml-2">{{$vaga->area}}</span></div>
                                    <div class="ml-3"><span class="ml-2">{{$vaga->situacao}}</span></div>                                
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div class="d-flex flex-column mr-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="p-2" href="{{route('edit_vaga', ['id' => $vaga->id]) }}">
                                            <i class="text-success fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="" data-target="#modal-delete-{{$vaga->id}}" data-toggle="modal">
                                            <i class="text-danger fa fa-trash fa-2x" aria-hidden="true"></i>    
                                        </a> 
                                    </div>
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



    @foreach ($vagas as $vaga)
        @include('vaga.modalExcluir')     
    @endforeach

@endsection

