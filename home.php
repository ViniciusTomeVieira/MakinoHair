<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #servicos{
                color: red;
                font-size: 40px;
                margin-right: 1%;           
            }
            #horarios{
                color: red; 
                font-size: 40px; 
                margin-left: 45%;                
            }
            #descricao{
                color: red;
                font-size: 20px;
                margin-right: 1%;
            }
            #descricao2{
                margin-left: 10%; 
                color: red; 
                font-size: 20px;
            }
            a img{
                opacity: 0.5;
                filter: alpha(opacity=50);
                border: 1px #000 solid;
            }
            a img:hover{
                opacity: 1.0;
                filter: alpha(opacity=100);
            }
            .item a img{
                opacity: 1.0;
            }
            
        </style>
    </head>
    <body>
        <div  style=" margin-left:2%;  width: 50%; height: 50%;" id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <a href="?pagina=todosserv"><img   style="width: 100%; height: 500px;" src="imagens/foto1.jpg" alt="..."></a>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
        <a href="?pagina=ondeencontrar"><img style="width: 100%; height: 500px;"  src="imagens/foto2.jpg" alt="..."></a>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
        <a href="?pagina=sobrenos"><img style="width: 100%; height: 500px;"  src="imagens/foto3.jpg" alt="..."></a>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
        <br />



<div style="border: 1px solid #e0e0e0; width: 80%; float: left; position: relative; height: 1px; margin-left: 10%;">
    
</div>

        <br /><p id="servicos">Serviços<a id="horarios">Horários</a></p><br />
        <div id="imagem-home">
            <a href="?pagina=todosserv"><img style="width: 25%; height: 25%; margin-right: 30%;" src="Imagens/servicos.jpg"></a><a href="?pagina=agenda"><img style="width: 25%; height: 20%;" src="Imagens/Calendario.jpg"></a><br />
        </div><br />
        <p id="descricao">Diversos cortes e procedimentos para cabelos a sua disposição!<a id="descricao2">Dê uma olhada em todos os horários disponíveis!</a></p><br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    </body>
</html>
