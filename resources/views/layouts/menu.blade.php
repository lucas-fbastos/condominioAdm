@extends('layouts.app')
@Section('content')
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="/gestaoFinanceira" class="list-group-item list-group-item-action bg-light"><i class="fas fa-receipt text-success mr-2"></i>Gestão Financeira</a>
        <a href="/livroOcorrencias" class="list-group-item list-group-item-action bg-light"><i class="fas fa-book text-success mr-2"></i>Livro de Ocorrências </a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Comunicados Oficiais</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Fale com o Síndico</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Classificados</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Álbum de fotos</a>
        @if(Auth::user()->perfil == 1 || Auth::user()->perfil == 2  )
        
        <a href="/register" class="list-group-item list-group-item-action bg-light">Cadastrar Usuário</a>

        @endif
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button class="btn btn-outline-success m-2" id="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
        <a class="btn btn-outline-success m-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i></a>
        <div class="container-fluid m-3">
           @yield('middle')
        </div>
    <!-- /#page-content-wrapper -->
    </div>
  <!-- /#wrapper -->
</div>
  <!-- Menu Toggle Script -->
  <script>
  
  function toggleMenu(){
    document.getElementById('wrapper').classList.toggle("toggled");
  }

  </script>

@endSection