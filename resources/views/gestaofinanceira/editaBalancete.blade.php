@extends('layouts.menu')
@Section('middle')
<form action="/balancete/{{$balancete->id}}" method="POST" enctype='multipart/form-data'>
    @csrf
    {{ method_field('PUT') }}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="titulo">Título <span class="text-danger" >*</span></label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$balancete->titulo}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao"  name="descricao">{{$balancete->descricao}}</textarea>
        </div>
    </div>
    @if($balancete->path != null)
        <div class="alert alert-success col-6">O arquivo atual pode ser acessado por <a href="/storage/{{$balancete->path}}" target="_blank">este link</a>, caso selecione um novo arquivo, este subistituirá o anterior.</div>
    @endif
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="file" class="custom-file-input" id="balancete" lang="br" name="balancete">
            <label class="custom-file-label" for="balancete">Selecionar Arquivo <span class="text-danger" required>*</span</label>
        </div>
    </div>
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection
