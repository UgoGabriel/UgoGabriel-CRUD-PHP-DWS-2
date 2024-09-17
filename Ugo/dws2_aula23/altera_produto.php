<?php require('pedacos/lay.php'); 
require('pedacos/conexao.php');
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(empty($id)){
?>
    <div class="alert alert-danger" role="alert">
         Falha ao abrir formulário para edição
         <p><?= $stmt->errorInfo() ?></p>
      </div>
<?php
    exit;
}
   $sql = "SELECT nome, preco, urlfoto, descricao FROM pratos WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $result = $stmt->execute([$id]);

   $rowProduto = $stmt->fetch();
?>
<style>
    .podo{
        display: flex;
        gap: 1rem;
    }
    .imigui{
        width: 30%;
        height: 30vh;
        border-radius: 10px;
        padding: 4px;
        border: 1px solid gray;
    }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Formulário alteração de produto</h1>
</div>
<div class="podo">
    <form action="alterar.php" style="width: 40%;" method="post">
            <input value="<?= $id ?>" hidden type="text" class="form-control" id="id" name="id" placeholder="Inclua o nome do alimento">
        <div class="mb-3">
            <label for="Nome" class="form-label">Nome:</label>
            <input value="<?= $rowProduto['nome'] ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Inclua o nome do alimento">
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input value="<?= $rowProduto['preco']?>" type="number" class="form-control" id="preco" name="preco" placeholder="Inclua o preço do alimento">
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL de uma foto do alimento:</label>
            <input value="<?= $rowProduto['urlfoto']?>" type="url" class="form-control" id="url" name="url" placeholder="Inclua a URL da imagem do alimento">
            <sup style="color:gray">Endereço HTTP de uma imagem na internet</sup>
        </div>
        <div class="mb-3">
            <label  for="desc" class="form-label">Descrição do produto</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"><?= $rowProduto['descricao']?></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Confirmar</button>
            <button type="reset" class="btn btn-warning">Cancelar</button>
        </div>
    </form>
    <img class="imigui" src="<?= $rowProduto['urlfoto'] ?>" alt="<?= $rowProduto['nome'] ?>">
</div>
<?php require_once('pedacos/out.php'); ?>