<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'config/conexao.php'; ?>
    </head>
    <body>
      <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th class="danger">Serviço</th>
          <th class="danger">Descrição</th>
          <th class="danger">Preço</th>
        </tr>
        <?php
          $sql_dds_srvc = "SELECT * FROM servicos WHERE FK_PK_tipo_serv=8";
          $r_ds_srvc = $pdo->query($sql_dds_srvc);
          while($row_dds = $r_ds_srvc->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
              <td><?php echo $row_dds['NOME_serv']; ?></td>
              <td><?php echo $row_dds['DESC_serv']; ?></td>
              <td>R$: <?php echo $row_dds['PRECO_serv']; ?></td>
            </tr>
        <?php
      }
        ?>
      </table>
      </div>
    </body>
</html>
