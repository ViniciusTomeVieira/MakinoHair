<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php
  include 'config/conexao.php'; ?>

      <body>
<div class="row">
    
          <?php
          $sql_galeria = "SELECT * FROM galeria";
          $result_galeria= $pdo->query($sql_galeria);
          while ($galeria= $result_galeria->fetch(PDO::FETCH_ASSOC)) {
                  $PK_galeria = $galeria['PK_foto'];
                  $Nome_img = $galeria['NOME_foto'];
                  $Img_gale = $galeria['LOCAL_foto'];
      ?>


    <div class="col-sm-2 col-md-3">
      <div class="thumbnail">
          <img class="img-rounded" src="<?php echo $Img_gale; ?>"  width="350" height="350" alt="<?php echo $Nome_img ?>">
        <div class="caption">
          <h3 class='vermelhomh'><?php echo $Nome_img;?></h3>
        </div>
      </div> 
    </div>
    <?php } ?>
  </div> 
          
      </body>
</html>