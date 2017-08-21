<!DOCTYPE html>
<html>
<head>
    <title>MAKINO HAIR</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="js/bootstrap.js" />
        <link rel="stylesheet" type="text/css" href="js/npm.js" />
        <script type="text/javascript" src="script/jquery-3.1.1.js"></script>
        <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
        <script>
          $(function () {
            $('.dropdown-toggle').dropdown();
          });
          $(document).ready(function(){
            $("#myModal").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title'); // Extract value from data-* attributes
        $(this).find('.modal-title').text(titleData + '');
    });
});
        </script>
        <style>
            #bs-example-navbar-collapse-1 ul li:hover{
               background: -webkit-linear-gradient(#fbfbfb, #e7e4e4);
                background: -o-linear-gradient(#fbfbfb, #e7e4e4); 
                background: -moz-linear-gradient(#fbfbfb, #e7e4e4);
                background: -moz-linear-gradient(#fbfbfb, #e7e4e4);
                background: linear-gradient(#fbfbfb,#e7e4e4);
                
            }
            #bs-example-navbar-collapse-1 ul li a:hover{
                color: red;
            }
        </style>

</head>
<body>
<nav class="navbar navbar-default" id="menu">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="menu">
        <li><a href="?pagina=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> HOME<span class="sr-only">(current)</span></a></li>
        <li><a href="?pagina=galeria"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> GALERIA</a></li>
         <li><a href="?pagina=agenda"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> AGENDA</a></li>
        <li><a href="?pagina=sobrenos"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> SOBRE NÓS</a></li>
        <li><a href="?pagina=contato"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> CONTATO</a></li>
        <li><a href="?pagina=ondeencontrar"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> ONDE ENCONTRAR</a></li>
        <li class="dropdown">
          <a href="?pagina=servico" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> SERVIÇOS<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?pagina=corte">Corte</a></li>
            <li><a href="?pagina=hidratacao">Hidratação</a></li>
            <li><a href="?pagina=escova">Escova</a></li>
            <li><a href="?pagina=coloracao">Coloração</a></li>
            <li><a href="?pagina=alisamento">Alisamento</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?pagina=todosserv">Todos</a></li>
          </ul>
        </li>
      </ul>
      <!--<form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <?php
          if(isset($_SESSION['id'])){
         ?>
            <li><a> <?php $_SESSION['login']; echo $_SESSION['login']?></a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> EDITAR <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="?pagina=cad-galeria"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> EDIÇÃO DA GALERIA</a></li>
                <li><a href="?pagina=cad-servicos"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> EDIÇÃO DOS SERVIÇOS</a></li>
                <li><a href="?pagina=agenda-edit"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> EDIÇÃO DOS HORARIOS</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="?pagina=sair"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> SAIR</a></li>
              </ul>
            </li>
        <?php
        }else{
        ?>
        <li><div class="divlogin">
    <!-- Button HTML (to Trigger Modal) -->
    <button type="button" class="btn btn-link navbar-link" data-toggle="modal" data-target="#myModal" data-title="Login">LOGIN</button>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <center>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title vermelhomh">Login</h4>
                </div>
                <form action="?pagina=login-adm" method="post">
                <div class="modal-body">

                        <div class="form-group">
                            <label for="usuario" class="control-label">Usuario:</label>
                            <input type="text" class="form-control" name="login">
                        </div>
                        <div class="form-group">
                            <label for="senha" class="control-label">Senha</label>
                            <input type="password" class="form-control" name="senha">
                        </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" value='Entrar' class="btn btn-success">
                    <input type="reset" value='Limpar Tudo' class="btn btn-danger">
                </div>
                </form>
            </div>
        </div>
        </center>
    </div>
</div>
<?php
  if((isset($_POST['login'])) && (isset($_POST['senha']))) {
    include 'config/conexao.php';

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE LOGIN_usu='$login' and SENHA_usu='$senha'";

    $qry = $pdo->query($sql);
    $row = $qry->fetch(PDO::FETCH_OBJ);

    if((!empty($row->PK_usu)) && (!empty($row->LOGIN_usu))) {

      $_SESSION['id'] = $row->PK_usu;
      $_SESSION['login'] = $row->LOGIN_usu;
      ?>
      <script type="text/javascript"> alert("Logado com Sucesso!"); </script>
      <script>window.location.replace("?pagina=home");</script>
      <?php

    }else{
      echo "Login ou Senha incorretos.";
    }

  }
 ?></li>
        <?php
        }
         ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    </b>
</body>
</html>
