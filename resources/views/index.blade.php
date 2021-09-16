@extends('templates.template')

@section('content')
    <!-- Page Content -->
  <div class="container text-center">

  <!-- /.container CORPO -->


  <div class="jumbotron">
    <h1 class="display-4">Sejam bem-vindos ao Jobs TI!</h1>
    <hr class="my-4">
    <p class="lead">Este é um sistema de cadastro de vagas que tem como objetivo ajudar a sua empresa a divulgar suas vagas.
      Este website é composto de informações sobre vagas de empregos da área de TI cadastradas pelas empresas.
      Nele, é possível o interessado encontrar sua vaga de emprego, estágio ou freelancer e entrar em contato com você.
      Cadastre sua empresa. Siga os passos:</br>
      1. Cadastre o usuário,</br>
      2. Cadastre as informações da empresa,</br>
      3. Publique a vaga.</br>
      Ao se cadastrar você concorda que este site não se reponsabiliza pelas informações adicionadas e que são de total responsabilidade da empresa
      que as publicam.
      </br></br>
      
      <a href="{{ route('register') }}" class="btn btn-outline-secondary">Cadastre sua empresa</a>
    </p>
    
    
  </div>


</div>
  <!-- /.container -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p class="copyright text-muted">Copyright &copy; Jobs TI {{date('Y')}}</p>
        </div>
      </div>
    </div>
  </footer>
@endsection