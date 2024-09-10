<?php 
   require_once('pedacos/lay.php'); 
   require 'pedacos/conexao.php';

   $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
   $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_NUMBER_FLOAT);
   $urlfoto = filter_input(INPUT_POST, "url", FILTER_SANITIZE_URL);
   $descricao = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_SPECIAL_CHARS);
// INSERT INTO `pratos`(`id`, `nome`, `preco`, `urlfoto`, `descricao`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
   echo "<p><b>Nome: </b>$nome</p>";
   echo "<p><b>Preço: </b>$preco</p>";
   echo "<p><b>URL foto: </b>$urlfoto</p>";
   echo "<p><b>Descricao: </b>$descricao</p>";
   $sql = "INSERT INTO `pratos`(`nome`, `urlfoto`, `descricao`) VALUES (?, ?, ?)";
   $stmt = $conn->prepare($sql);
   $result = $stmt->execute([$nome, $urlfoto, $descricao]);

   if($result == true){
      // Deu certo a conexao
?>
   <div class="alert alert-success" role="alert">
      Dados gravados com sucesso
   </div>
<?php
   } else {
      // Não deu certo a conexão
?>
      <div class="alert alert-danger" role="alert">
         Falha ao efetuar a gravação
      </div>
<?php
   }
   require_once('pedacos/out.php'); ?>