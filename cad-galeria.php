
<?php
  include 'config/conexao.php';

  if(!empty($_SESSION['id'])){
    if((!isset($_POST['id_img_edit'])) && (!isset($_POST['id_img_exc'])) && (!isset($_POST['editar_s'])) && (!isset($_POST['excluir_s']))) {
      if((!isset($_POST['Nome_img'])) && (!isset($_POST['Desc_img'])) && (!isset($_FILE['Img_gale']))) {
   ?>

  <form action="?pagina=cad-galeria" method="post" enctype="multipart/form-data">
    <div class="form-group">  
    <label for="Nome_img">Titulo da Foto:</label>
    <input class='form-control' type="text" name="Nome_img" maxlength=15 />
    </div>
      
    <!--<div class="form-group">
    <label for="Desc_img">Descrição da Foto:</label>
    <input type='text' class='form-control' maxlength=43 name="Desc_img"/>
    </div>-->
      
    <div class="form-group">
    <label for="Img_gale">Arquivo de Imagem:</label> 
    <input class='btn ' type="file" name="Img_gale" />
    </div>
      
      <input class='btn btn-success' type="submit" value="Cadastrar" /> <input class='btn btn-danger' type="reset" value="Cancelar" />
  </form>

  <?php
      }else{
        $Nome_img = $_POST['Nome_img'];
        $Img_gale = $_FILES['Img_gale'];

        $nomeFinal = time().$Img_gale['name'];
        $local = "imagens/fotos/".$nomeFinal;
    	  move_uploaded_file($Img_gale['tmp_name'], $local);
        if ((isset($Nome_img))
                &&(isset($Img_gale))){
            $query = "INSERT INTO galeria (NOME_foto,LOCAL_foto)
                            VALUES ('$Nome_img','$local')";
           $pdo->query($query);
           ?>

           <script>window.location.replace("?pagina=cad-galeria");</script>
           <?php
        }else{
            echo'Você fez algo errado cabeça de gilmar';
        }
      }
  ?>
  <br />
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
          <img class="img-responsive img-rounded" src="<?php echo $Img_gale; ?>" height="250" width="200" alt="<?php echo $Nome_img ?>">
        <div class="caption">
          <h3><?php echo $Nome_img;?></h3>
          <p><form action="?pagina=cad-galeria" method="post"><input type="hidden" value="<?php echo $PK_galeria; ?>" name="id_img_exc" readonly><input type="hidden" value="<?php echo $Img_gale; ?>" name="local_img_exc" readonly><input type="submit" class="btn btn-danger" value="Excluir" /></p></form>
        </div>
      </div> 
    </div>
    <?php } ?>
  </div> 
  <br />
  <?php
}if (isset($_POST['id_img_edit'])) {
      $pk_f = $_POST['id_img_edit'];
      $sql_assdw = "SELECT * FROM galeria WHERE PK_foto=$pk_f";
      $rqst = $pdo->query($sql_assdw);
      $r_rs = $rqst->fetch(PDO::FETCH_ASSOC);

  ?>
      <form action="?pagina=cad-galeria" method="post">
        <input type="hidden" value="S" name="editar_s" />
        <input type="hidden" value="<?php echo $r_rs['PK_foto'];?>" name="id_foto"/>
        <div class="thumbnail">
          <img class="img-responsive img-rounded" src="<?php echo $r_rs['LOCAL_foto'] ?>" height="250" width="200" alt="<?php echo $nome_foto ?>">

          </div>
        <div class='caption'>
        Nome do Serviço: 
        <input type="text" class='form-control' value="<?php echo $r_rs['NOME_foto'];?>" name="nome_foto" /><br />
        <p><input type="submit" class='btn btn-success' value="Atualizar" /> <button class="btn btn-danger"><a href="?pagina=cad-galeria">Cancelar</a></button> </p>
        </div>
              <?php
    }if (isset($_POST['editar_s'])) {
      $id_foto = $_POST['id_foto'];
      $nome_foto = $_POST['nome_foto'];

      $queryasas = "UPDATE galeria SET NOME_foto='$nome_foto', WHERE PK_foto='$id_foto'";
      $pdo->query($queryasas);

      ?>
      <script>window.location.replace("?pagina=cad-galeria");</script>
      <?php
    }
    if (isset($_POST['id_img_exc'])){
      $foto = $_POST['local_img_exc'];
?>
      <div class="thumbnail">
    <img class="img-responsive img-rounded" src="<?php echo $foto; ?>" />
      </div>
    <form action="?pagina=cad-galeria" method="post">
      <input type="hidden" value="<?php echo $_POST['id_img_exc'];?>" name="excluir_s" />
      <input type="hidden" value="<?php echo $foto;?>" name="excluir_sds" />
      <input type="submit" class='btn btn-success' value="Confirmar" readonly/> | <button class="btn btn-danger cancel-exc-edit" readonly><a href="?pagina=cad-galeria">Cancelar</a></button>
    </form>
<?php
    }if (isset($_POST['excluir_s'])){
      $pk_exc = $_POST['excluir_s'];
      $local_foto = $_POST['excluir_sds'];
      $sqlasas = "DELETE FROM galeria WHERE PK_foto='$pk_exc'";
      $pdo->query($sqlasas);

      unlink($local_foto);

      ?>
      <script>window.location.replace("?pagina=cad-galeria");</script>
      <?php
    }
  }
?>
