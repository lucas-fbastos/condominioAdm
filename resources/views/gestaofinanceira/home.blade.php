@extends('layouts.menu')
@Section('middle')
<h1 class="title">Balancetes</h1>
<h6>Lista dos últimos balancetes cadastrados - apenas usuários com perfil de administrador podem cadastrar balancetes.</h6>
<form action="/balancete/consulta" method="POST"  class="row m-3">
        @csrf
        <input type="text" class="form-control col-6" name="titulo" placeholder="digite aqui o titulo do balancete que deseja procurar">
        <button type="submit" class="btn btn-success ml-2"><i class="fas fa-search"></i></button>
</form>
<div class="row text-center">
    @if(Auth::user()->perfil == 1)
    <a href="/balancete/cadastrar"class=" btn btn-block btn-success col-10 col-md-4">
        <i class="far fa-plus-square"></i> Adicionar Balancete 
    </a>
    @endif
</div>
<div class="row text-center mt-4">
    @if($balancetes->count()>0)
        @foreach($balancetes as $balancete)
        <div class="col-lg-3 col-md-6 m-2 ">
            <div class="card shadow">
                <div class="card-header">
                    <h2>{{$balancete->titulo}}</h2>
                    <p class="text-muted mt-2">Por:
                        <strong class="text-capitalize">
                            {{$balancete->users->name}}
                        </strong>
                         em {{$balancete->created_at->format('d/m/y h:i:s')}}
                    </p>
                </div>
                <img class="card-img-top" src="{{asset('/static_imgs/undraw_contract_uy56.svg')}}" height="200px" alt="">
                <div class="card-body">
                    <p class="card-text">{{$balancete->descricao}}</p>
                </div>
                <div class="card-footer">
                    Clique no link abaixo para visualizar o balancete.
                    <a href="/storage/{{$balancete->path}}" class="btn btn-block col-md-8 offset-md-2 btn-outline-success mt-2" target="_blank">Abrir Documento</a>
                    @if(Auth::user()->perfil == 1)
                    <div>
                        
                        <a class="btn col-4 btn-outline-success mt-2" href="/balancete/edita/{{$balancete->id}}"><i class="fas fa-edit"></i></a>
                      
                        <form action="/balancete/{{$balancete->id}}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn col-4 btn-outline-danger mt-2"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>    
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    @else
    <div class="alert alert-danger lert-dismissible fade show m-4" role="alert">
        Não existem balancetes cadastrados no momento.
        <button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
<div class="row">
    @if(method_exists($balancetes,'links'))
    {{$balancetes->links()}}
    @endif
</div>
@endSection