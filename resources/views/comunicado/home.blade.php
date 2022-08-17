@extends('layouts.menu')
@Section('middle')
<div class="row text-center mt-4">
    <div class="col-lg-3 col-md-6 m-2 ">
        <div class="card shadow">
            <div class="p-4">
                <h4>Festa Junina do Residencial Jockey</h4>
                <hr>
            </div>
            
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id turpis et sapien ullamcorper blandit. Cras facilisis, lorem a venenatis pulvinar, libero sapien faucibus elit, id feugiat ipsum metus eu sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque a cursus nunc. Nullam purus nisl, vestibulum sed maximus sit amet, faucibus at massa. Vestibulum lectus erat, vestibulum at aliquam id, placerat pellentesque ipsum. Proin a consequat tellus. Nam semper nisi nec erat varius, at suscipit magna vestibulum. Mauris nec arcu vel sem ultricies ornare sit amet semper enim. Nam mattis iaculis magna non mollis. Nunc a ante vehicula, maximus purus non, pulvinar sem. Donec ac rutrum ex. Maecenas sed dolor vulputate, aliquet purus sed, mollis nulla.</p>
            </div>
            <div class="pb-4">
                <small>Publicado por: <b>Edson Menezes</b></small><br>
                <small>13-08-2022</small>
                @if(Auth::user()->perfil == 1)
                    <div>
                        <a class="btn col-4 btn-outline-success mt-2" href="/balancete/edita/asdasd"><i class="fas fa-edit"></i></a>
                        <form action="/balancete/asdasd" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn col-4 btn-outline-danger mt-2"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>    
                @endif
            </div>
        </div>
    </div>
    
   
    <div class="alert alert-danger lert-dismissible fade show m-4" role="alert">
        Não existem balancetes cadastrados no momento.
        <button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
</div>
@endSection