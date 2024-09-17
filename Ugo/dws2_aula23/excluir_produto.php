<?php 
   require_once('pedacos/lay.php'); 
   require 'pedacos/conexao.php';

   $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
// DELETE FROM `pratos` WHERE 0
   echo "<p><b>ID: </b>$id</p>";
   $sql = "DELETE FROM pratos WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $result = $stmt->execute([$id]);

   if($result == true){
      // Deu certo a conexao
?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Excluir produtos</h1>
    </div>
   <div class="alert alert-success" role="alert">
      Dados apagados com sucesso
   </div>
<?php
   } else {
      // Não deu certo a conexão
?>
      <div class="alert alert-danger" role="alert">
         Falha ao efetuar a exclusão
         <p><?= $stmt->errorInfo() ?></p>
      </div>
<?php
   }
   require_once('pedacos/out.php'); ?>