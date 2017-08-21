<?php
  include 'config/conexao.php';
  if(!empty($_SESSION['id'])){
    if((!isset($_POST['id_serv_edit'])) && (!isset($_POST['id_serv_exc'])) && (!isset($_POST['editar_s'])) && (!isset($_POST['excluir_s']))) {
      if(isset($_POST['nome_serv'])) {
        if (!empty($_POST['nome_serv']) && !empty($_POST['desc_serv']) && !empty($_POST['tipo_serv'])) {
          $nome = $_POST['nome_serv'];
          $desc = $_POST['desc_serv'];
          $tipo = $_POST['tipo_serv'];
          $sql_cad_serv = "INSERT INTO servicos (NOME_serv, DESC_serv, FK_PK_tipo_serv) VALUES ('$nome', '$desc', '$tipo')";
          $pdo->query($sql_cad_serv);

          ?>
          <script>window.location.replace("?pagina=cad-servicos");</script>
          <?php
        }else{
          echo "Preencha todos os campos.";
        }
      }

  ?>
      <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th>Nome de Serv.</th>
          <th>Descrição de Serv.</th>
          <th>Tipo de Serv.</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
        <?php
          $sql_dds_srvc = "SELECT * FROM servicos as s INNER JOIN tipos_serv as ts ON s.FK_PK_tipo_serv=ts.PK_tipo";
          $r_ds_srvc = $pdo->query($sql_dds_srvc);
          while($row_dds = $r_ds_srvc->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
              <td><?php echo $row_dds['NOME_serv']; ?></td>
              <td><?php echo $row_dds['DESC_serv']; ?></td>
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
        <label for="nome_tipo_serv">Nome do tipo de Serv. </label> 
        <input type="text" class="form-control" name="nome_tipo_serv" /><br />
        </div>
          <input type="submit" class="btn btn-success" value="Cadastrar" /> <input type="reset" class="btn btn-danger" value="Cancelar" />
      </form>
            
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
        Nome do Serviço: <input type="text" value="<?php echo $r_rs['NOME_serv'];?>" name="nome_serv" /><br />
        Descrição do Serviço: <input type="text" value="<?php echo $r_rs['DESC_serv'];?>" name="desc_serv" /><br />
        Tipo de Serviço:
        <select name="t_s">
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
          <input type="submit" value="Atualizar" /> <input type="reset" value="Cancelar" />
      </form>
<?php
    }if (isset($_POST['editar_s'])) {
      $id_serv = $_POST['id_serv'];
      $nome_serv = $_POST['nome_serv'];
      $desc_serv = $_POST['desc_serv'];
      $t_s = $_POST['t_s'];

      $queryasas = "UPDATE servicos SET NOME_serv='$nome_serv', DESC_serv='$desc_serv', FK_PK_tipo_serv='$t_s' WHERE PK_serv='$id_serv'";
      $pdo->query($queryasas);

      ?>
      <script>window.location.replace("?pagina=cad-servicos");</script>
      <?php
    }
    if (isset($_POST['id_serv_exc'])){
?>
    <form action="?pagina=cad-servicos" method="post">
      <input type="hidden" value="<?php echo $_POST['id_serv_exc'];?>" name="excluir_s" />
      <input type="submit" value="Confirmar"/><button OnClick="<?php header('location=?pagina=cad-servicos'); ?>">Cancelar</button>
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
