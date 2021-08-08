@extends('layouts.menu')
@Section('middle')
<form action="{{route('insereBalancete')}}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="titulo">Título <span class="text-danger" required>*</span></label>
            <input type="text" class="form-control" id="titulo" name="titulo">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao"  name="descricao"></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <input type="file" class="custom-file-input" id="balancete" lang="br" name="balancete" required>
        <label class="custom-file-label" for="balancete">Selecionar Arquivo <span class="text-danger" >*</span</label>
        </div>
    </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@endsection
