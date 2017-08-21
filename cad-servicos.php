<script>
jQuery(function($){
$("#preco_serv").mask("999.99,99");
$("#campoTelefone").mask("(999) 999-9999");
$("#campoSenha").mask("***-****");
});
</script>
<?php
  include 'config/conexao.php';
  
  if(!empty($_SESSION['id'])){
    if((!isset($_POST['id_serv_edit'])) && (!isset($_POST['id_serv_exc'])) && (!isset($_POST['id_ts_exc'])) &&(!isset($_POST['editar_s'])) && (!isset($_POST['excluir_s']))) {
      if(isset($_POST['nome_serv'])) {
        if (!empty($_POST['nome_serv']) && !empty($_POST['desc_serv']) && !empty($_POST['preco_serv']) && !empty($_POST['tipo_serv'])) {
          $nome = $_POST['nome_serv'];
          $desc = $_POST['desc_serv'];
          $preco = $_POST['preco_serv'];
          $tipo = $_POST['tipo_serv'];
          $sql_cad_serv = "INSERT INTO servicos (NOME_serv, DESC_serv, PRECO_serv, FK_PK_tipo_serv) VALUES ('$nome', '$desc', '$preco', '$tipo')";
          $pdo->query($sql_cad_serv);

          ?>
          <script>window.location.replace("?pagina=cad-servicos");</script>
          <?php
        }else{
          echo "Preencha todos os campos.";
        }
      }

  ?>
      <form action="?pagina=cad-servicos" method="post">
          <div class="form-inline">
          <div class="form-group">
         <label for="Nomedaimg">Nome do serviço</label><br/>
         <input class="form-control" size='30' type="text" name="nome_serv" />
          </div>
              <div class="form-group">
         <label for="Nomedaimg">Descrição de Serviço:</label><br/>
         <input class="form-control" size='30' type="text" name="desc_serv" />
              </div>
        </div>
          <div class="form-inline">
         <div class="form-group">
         <label for="Nomedaimg">Preço do Serviço:</label><br/>
         <input class="form-control" size='5' type="text" name="preco_serv" />
         </div>
         <div class="form-group">
        <label for="Nomedaimg">Tipo de Serviço:</label><br/>
        <select class="form-control" name="tipo_serv">
          <?php
            $sql_ts = "SELECT * FROM tipos_serv";
            $r = $pdo->query($sql_ts);
            while($row_ts = $r->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <option value=<?php echo $row_ts['PK_tipo']; ?>><?php echo $row_ts['NOME_tipo']; ?></option>
              <?php
            }
          ?>
        </select>
         </div>
         </div><p/>
          <p><input type="submit" class="btn btn-success" value="Cadastrar" /> <input type="reset" class="btn btn-danger" value="Cancelar" ></p>
              </form>
      <br />
      <br />
      <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th class="danger">Nome do Serviço</th>
          <th class="danger">Descrição do Serviço</th>
          <th class="danger">Preço do Serviço</th>
          <th class="danger">Categoria</th>
          <th class="danger">Editar</th>
          <th class="danger">Excluir</th>
        </tr>
        <?php
          $sql_dds_srvc = "SELECT * FROM servicos as s INNER JOIN tipos_serv as ts ON s.FK_PK_tipo_serv=ts.PK_tipo";
          $r_ds_srvc = $pdo->query($sql_dds_srvc);
          while($row_dds = $r_ds_srvc->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
              <td><?php echo $row_dds['NOME_serv']; ?></td>
              <td><?php echo $row_dds['DESC_serv']; ?></td>
              <td>R$: <?php echo $row_dds['PRECO_serv']; ?></td>
              <td><?php echo $row_dds['NOME_tipo']; ?></td>
              <td><form action="?pagina=cad-servicos" method="post"><input type="hidden" value="<?php echo $row_dds['PK_serv']; ?>" name="id_serv_edit" readonly><input type="submit" class="btn btn-info "value="Editar" /></form></td>
              <td><form action="?pagina=cad-servicos" method="post"><input type="hidden" value="<?php echo $row_dds['PK_serv']; ?>" name="id_serv_exc" readonly><input type="submit" class="btn btn-danger" value="Excluir" /></form></td>
            </tr>
        <?php
      }
        ?>
      </table>
      </div>
      <br />
      <br />
      <?php
        if(isset($_POST['nome_tipo_serv'])) {
          if (!empty($_POST['nome_tipo_serv'])) {
            $nomet = $_POST['nome_tipo_serv'];
            $sql_cad_tserv = "INSERT INTO tipos_serv (NOME_tipo) VALUES ('$nomet')";
            $pdo->query($sql_cad_tserv);

            ?>
            <script>window.location.replace("?pagina=cad-servicos");</script>
            <?php
          }else{
            echo "Preencha todos os campos.";
          }
        }
      ?>

      <form action="?pagina=cad-servicos" method="post">
          <div class="form-group">
        <label for="nome_tipo_serv">Categoria </label>
        <input type="text" class="form-control" name="nome_tipo_serv" /><br />
        </div>
          <input type="submit" class="btn btn-success" value="Cadastrar" /> <input type="reset" class="btn btn-danger" value="Cancelar" />
      </form>

      <br />
      <br />
      <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th>Nome do Tipo de Serv.</th>
          <th>Excluir</th>
        </tr>
        <?php
          $sql_t_srvc = "SELECT * FROM tipos_serv";
          $r_t_srvc = $pdo->query($sql_t_srvc);
          while($row_ts = $r_t_srvc->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
              <td><?php echo $row_ts['NOME_tipo']; ?></td>
              <td><form action="?pagina=cad-servicos" method="post"><input type="hidden" value="<?php echo $row_ts['PK_tipo']; ?>" name="id_ts_exc" readonly><input type="submit" class="btn btn-danger" value="Excluir" /></form></td>
            </tr>
        <?php
      }
        ?>
      </table>
      </div>
      <br />
      <br />

  <?php

}if(isset($_POST['id_ts_exc'])){
  $pk_ts_exc = $_POST['id_ts_exc'];
  $sqlasastts = "DELETE FROM tipos_serv WHERE PK_tipo='$pk_ts_exc'";
  $pdo->query($sqlasastts);

  ?>
  <script>window.location.replace("?pagina=cad-servicos");</script>
  <?php
}if (isset($_POST['id_serv_edit'])) {
      $pk_s = $_POST['id_serv_edit'];
      $sql_assdw = "SELECT * FROM servicos WHERE PK_serv=$pk_s";
      $rqst = $pdo->query($sql_assdw);
      $r_rs = $rqst->fetch(PDO::FETCH_ASSOC);
  ?>
      <form action="?pagina=cad-servicos" method="post">
        <input type="hidden" value="S" name="editar_s" redonly/>
        <input type="hidden" value="<?php echo $r_rs['PK_serv'];?>" name="id_serv" redonly/>
        <div class="form-group">
        <label for="nome_serv">Nome do Serviço:</label>
        <input type="text" class='form-control' value="<?php echo $r_rs['NOME_serv'];?>" name="nome_serv" /><br />
        </div>
        <div class="form-group">
        <label for="desc_serv">Descrição do Serviço:</label> 
        <input type="text" class='form-control' value="<?php echo $r_rs['DESC_serv'];?>" name="desc_serv" /><br />
        </div>
        <div class="form-group">
        <label for="preco_serv">Preço do Serviço:</label>
        <input type="text" class='form-control' value="<?php echo $r_rs['PRECO_serv'];?>" name="preco_serv" /><br />
        </div>
        <div class="form-group">
        <label for="Nome_img">Categoria</label>
        <select class='form-control' name="t_s">
          <?php
            $sql_ts = "SELECT * FROM tipos_serv";
            $r = $pdo->query($sql_ts);
            while($row_ts = $r->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <option value=<?php echo $row_ts['PK_tipo']; ?>><?php echo $row_ts['NOME_tipo']; ?></option>
              <?php
            }
          ?>
        </select>
        </div> 
          <input type="submit" class='btn btn-success' value="Atualizar" /> <button class="btn btn-danger cancel-exc-edit"><a href="?pagina=cad-servicos">Cancelar</a></button>
      </form>
<?php
    }if (isset($_POST['editar_s'])) {
      $id_serv = $_POST['id_serv'];
      $nome_serv = $_POST['nome_serv'];
      $desc_serv = $_POST['desc_serv'];
      $preco_serv = $_POST['preco_serv'];
      $t_s = $_POST['t_s'];

      $queryasas = "UPDATE servicos SET NOME_serv='$nome_serv', DESC_serv='$desc_serv', PRECO_serv='$preco_serv', FK_PK_tipo_serv='$t_s' WHERE PK_serv='$id_serv'";
      $pdo->query($queryasas);

      ?>
      <script>window.location.replace("?pagina=cad-servicos");</script>
      <?php
    }
    if (isset($_POST['id_serv_exc'])){
?>
    <form action="?pagina=cad-servicos" method="post">
      <input type="hidden" value="<?php echo $_POST['id_serv_exc'];?>" name="excluir_s" />
      <input type="submit" value="Confirmar"/><button class="btn btn-danger cancel-exc-edit"><a href="?pagina=cad-servicos">Cancelar</a></button>
    </form>
<?php
    }if (isset($_POST['excluir_s'])){
      $pk_exc = $_POST['excluir_s'];
      $sqlasas = "DELETE FROM servicos WHERE PK_serv='$pk_exc'";
      $pdo->query($sqlasas);

      ?>
      <script>window.location.replace("?pagina=cad-servicos");</script>
      <?php
    }
  }
?>
