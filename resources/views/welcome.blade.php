@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="text-center">
                <h4 class="title">
                    Bem Vindo!
                </h4>
                <p class="text-secondary subtitle">
                    Com a plataforma de administração você pode acompanhar o que tem sido feito pela administração do seu condomínio.
                </p>
            </div>
            <div class="col-12 overflow-hidden">
                <img src="{{asset('static_imgs/undraw_online_organizer_ofxm.svg')}}" height="100%" width="100%"  class="img-home" alt="home">
            </div>
        </div>
            <p class="title text-center mt-4">Principais Funcionalidades</p>
            <div class="row offset-md-2 mt-2">
                <div class="card col-12 col-md-3 shadow m-2" style="width: 18rem;" >
                    <img src="{{asset('static_imgs/undraw_Agreement_re_d4dv.svg')}}" height="201.22px" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text"><strong> Comunicados Oficiais</strong> - por meio dessa funcionalidade é possível conferir as Atas, Editais e Assembleias realizadas.</p>
                    </div>
                </div>
                <div class="card col-12 col-md-3 shadow m-2" style="width: 18rem;" >
                    <img src="{{asset('static_imgs/undraw_Personal_notebook_re_d7dc.svg')}}" height="201.22px" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text"><strong> Livro de Ocorrências</strong> - verifique incidentes e eventualidades registradas.</p>
                    </div>
                </div>
                <div class="card col-12 col-md-3 shadow  m-2" style="width: 18rem;" >
                    <img src="{{asset('static_imgs/undraw_Segment_analysis_re_ocsl.svg')}}" height="201.22px" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text"><strong> Gestão Financeira</strong> - consulte os balancetes que foram incluídos pelo síndico.</p>
                    </div>
                </div>
                <div class="card col-12 col-md-3 shadow m-2" style="width: 18rem;" >
                    <img src="{{asset('static_imgs/undraw_web_shopping_dd4l.svg')}}" height="201.22px" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text"><strong> Classificados </strong>- anuncie um item para venda ou consulte o que outros moradores anunciaram.</p>
                    </div>
                </div>
                <div class="card col-12 col-md-3 shadow m-2" style="width: 18rem;" >
                    <img src="{{asset('static_imgs/undraw_Chatting_re_j55r.svg')}}" height="201.22px" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text"><strong> Fale com o Síndico </strong>- esteja em contato direto com o síndico do condomínio.</p>
                    </div>
                </div>
                <div class="card col-12 col-md-3 shadow m-2" style="width: 18rem;" >
                    <img src="{{asset('static_imgs/undraw_Photos_re_pvh3.svg')}}" height="201.22px" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text"><strong> Álbum de fotos </strong>- galeria com fotos do condomínio.</p>
                    </div>
                </div>
            </div>      
       
    </div>
@endsection
