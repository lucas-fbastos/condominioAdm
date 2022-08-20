@extends('layouts.menu')
@section('middle')
<h1 class="title">Livro de Ocorrências</h1>
<h6>Livro de registros do Condomínio - Apenas usuários autorizados podem fazer registros</h6>
<form class=" mt-4" method="POST"
    @if(!isset($ocorrencia)) 
        action="{{route('insereOcorrencia')}} ">
    @else
        action="/livroOcorrencias/atualizar/{{$ocorrencia->id}}" >
        @method('PUT')
    @endIf
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tipoOcorrencia">Tipo de Ocorrência <span class="text-danger" required>*</span></label>
            <select class="form-control" id="tipoOcorrencia" name="tipoOcorrencia">
                @foreach($tiposOcorrencia as $tipo)    
                    <option value="{{$tipo->id}}"
                    @if(isset($ocorrencia) && $ocorrencia->tipo_ocorrencias_id == $tipo->id)
                            selected
                    @endif
                    >{{$tipo->descricao_tipo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dataOcorrencia">Data da Ocorrência <span class="text-danger" required>*</span></label>
            <input type="datetime-local" class="form-control" id="dataOcorrencia" name="dataOcorrencia" 
                @if(isset($ocorrencia))
                            value="{{$ocorrencia->data_ocorrencia}}"
                @endif
            >
        </div>
    </div>
   
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="descricao">Descrição da Ocorrência <span class="text-danger" required>*</span></label>
            <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control">@if(isset($ocorrencia)){{$ocorrencia->descricao}}@endif</textarea> 
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block col-6">Salvar</button>
</form>
@endsection