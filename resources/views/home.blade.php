@extends('layouts.menu')

@section('middle')
<h1 class="mt-4 title">Menu inicial</h1>
            <h4>Itens adicionados nos últimos 15 dias</h4>
            <div class="row">       
                <div class="card m-2 border-success col-12 col-md-2 animated wobble ">
                    <div class="card-body">
                        <div class="badge badge-success">0</div> novo(s) Comunicado(s) <i class="far fa-file-alt text-success"></i>
                    </div>
                </div>
                <div class="card m-2  border-success col-12 col-md-2 animated wobble">
                    <div class="card-body">
                        <div class="badge badge-success">0</div> novo(s) Balancete(s) <i class="fas fa-receipt text-success"></i>
                    </div>
                </div>
                <div class="card m-2  border-success col-12 col-md-2 animated wobble">
                    <div class="card-body">
                        <div class="badge badge-success">0</div> nova(s) Enquete(s) <i class="fas fa-poll-h text-success"></i>
                    </div>
                </div>
            </div>

         
            <div class="row text-center ">  
            @if($lastBalancete !=null && sizeof($lastBalancete)>0)
                <div class="col-lg-4 col-md-6 mb-2 ">
                <h4 class="mt-3">Último Balancete Cadastrado</h4>
                    <div class="card shadow">
                        <div class="card-header">
                            <p class="text-muted mt-2">Cadastrado por:
                                <strong class="text-capitalize">
                                    {{$lastBalancete[0]->users->name}}
                                </strong>
                                em {{$lastBalancete[0]->created_at->format('d/m/y h:i:s')}}
                            </p>
                        </div>
                        <img class="card-img-top" src="{{asset('/static_imgs/undraw_contract_uy56.svg')}}" height="200px" alt="">
                        <div class="card-body">
                            <h4 class="card-title text-capitalize">{{$lastBalancete[0]->titulo}}</h4>
                            <p class="card-text">{{$lastBalancete[0]->descricao}}</p>
                        </div>
                        <div class="card-footer">
                            Clique no link abaixo para visualizar o balancete.
                            <a href="/storage/{{$lastBalancete[0]->path}}" class="btn btn-block btn-outline-success mt-2"  target="_blank">Abrir Documento</a>
                        </div>
                    </div>
                </div>
            @else
            <div class="alert alert-danger lert-dismissible fade show m-4" role="alert">
                Não existem balancetes cadastrados no momento.
                <button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if($ocorrencias->count()>0)
                <div class="col-lg6 col-md-6">
                <h4 class="mt-3">Últimos Registros do livro de ocorrências</h4>
                    <div class="jumbotron bg-light  shadow">
                        
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
                        <a href="/livroOcorrencias" class="btn btn-block btn-outline-success">Ver Mais</a>
                    </div>
                </div>
                @else
                    <div class="alert alert-danger lert-dismissible fade show m-4" role="alert">
                        Não existem ocorrencias cadastradas no momento.
                        <button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                 @endif
            </div>

@endsection
