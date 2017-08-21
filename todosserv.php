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
          <th class="danger">Nome de Serv.</th>
          <th class="danger">Descrição de Serv.</th>
          <th class="danger">Preços de Serv.</th>
        </tr>
        <?php
          $sql_dds_srvc = "SELECT * FROM servicos ORDER BY FK_PK_tipo_serv ASC";
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
