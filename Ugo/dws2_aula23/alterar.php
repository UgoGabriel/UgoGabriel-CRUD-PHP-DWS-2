<?php 
   require_once('pedacos/lay.php'); 
   require 'pedacos/conexao.php';

   $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
   $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_NUMBER_FLOAT);
   $urlfoto = filter_input(INPUT_POST, "url", FILTER_SANITIZE_URL);
   $descricao = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_SPECIAL_CHARS);
   $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
// UPDATE `pratos` SET `id`='[value-1]',`nome`='[value-2]',`preco`='[value-3]',`urlfoto`='[value-4]',`descricao`='[value-5]' WHERE 1

   echo "<p><b>ID: </b>$id</p>";   
   echo "<p><b>Nome: </b>$nome</p>";
   echo "<p><b>Preço: </b>$preco</p>";
   echo "<p><b>URL foto: </b>$urlfoto</p>";
   echo "<p><b>Descricao: </b>$descricao</p>";
   $sql = "UPDATE pratos SET nome = ? , preco = ?, urlfoto = ?, descricao = ? WHERE ID = ?";
   $stmt = $conn->prepare($sql);
   $result = $stmt->execute([$nome, $preco, $urlfoto, $descricao, $id]);
   if($result == true){
      // Deu certo a conexao
?>
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Inserção de produtos</h1>
    </div>
   <div class="alert alert-success" role="alert">
      Dados gravados com sucesso
   </div>
<?php
   } else {
      // Não deu certo a conexão
?>
      <div class="alert alert-danger" role="alert">
         Falha ao efetuar a gravação
         <p><?= $stmt->errorInfo() ?></p>
      </div>
<?php
   }
   require_once('pedacos/out.php'); ?>