@extends('layouts.menu')
@section('middle')
<h1 class="title">Livro de Ocorrências</h1>
<h6>Livro de registros do Condomínio - Apenas usuários autorizados podem fazer registros</h6>
<form class=" mt-4 row " action="/ocorrencia/filtrar" method="POST">
    @csrf
    <select class="form-control col-4" id="tipoOcorrencia" name="tipoOcorrencia">
        @foreach($tiposOcorrencia as $tipo)    
            <option value="{{$tipo->id}}">{{$tipo->descricao_tipo}}</option>
        @endforeach
    </select> 
    <button type="submit" class="btn btn-success col-2 ml-2"><i class="fas fa-search"></i></button>
</form>

<div class="row text-center mt-3">
    @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2  )
    <a href="/livroOcorrencias/cadastrar"class=" btn btn-block btn-success col-10 col-md-4">
        <i class="far fa-plus-square"></i> Adicionar Registro 
    </a>
    @endif
</div>
<div class="row mt-4">
    <div class="jumbotron bg-light py-4 shadow col-8">
        @foreach($ocorrencias as $ocorrencia)
            <div class="card-footer border-success m-3 col-12 ">
                <div class="row">
                    <h5 class="col-8">{{$ocorrencia->tipoOcorrencias->descricao_tipo}} <i class="{{$ocorrencia->tipoOcorrencias->icon}}"></i> </h5>
                    @php {{ $date = date_create($ocorrencia->data_ocorrencia);}} @endphp
                    <h5><i class="fas fa-calendar-alt mr-3"></i>@php {{ echo(date_format($date,'d/m/Y H:i:s')); }}@endphp </h5>
                </div>
                <hr>
                <label>Descrição</label>
                <p class="p-2">
                    {{$ocorrencia->descricao}}
                </p>
                
                <div  class="mt-2">
                <span class="text-muted"><i class="fas fa-user-tag"></i>&nbsp;{{$ocorrencia->users->name}}</span><br>
                <span class="text-muted"> <i class="fas fa-clock"></i>&nbsp;{{$ocorrencia->created_at->format('d/m/y h:i:s')}}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="row">
    @if(method_exists($ocorrencias,'links'))
    {{$ocorrencias->links()}}
    @endif
</div>


@endsection