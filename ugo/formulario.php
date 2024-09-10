<?php require_once('pedacos/lay.php'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Início</h1>
</div>
<form action="inserir_produto.php" style="width: 40%;" method="post">
    <div class="mb-3">
        <label for="Nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Inclua o nome do alimento">
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço:</label>
        <input type="number" class="form-control" id="preco" name="preco" placeholder="Inclua o preço do alimento">
    </div>
    <div class="mb-3">
        <label for="url" class="form-label">URL de uma foto do alimento:</label>
        <input type="url" class="form-control" id="url" name="url" placeholder="Inclua a URL da imagem do alimento">
        <sup style="color:gray">Endereço HTTP de uma imagem na internet</sup>
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Descrição do produto</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Confirmar</button>
        <button type="reset" class="btn btn-warning">Cancelar</button>
    </div>
</form>
<?php require_once('pedacos/out.php'); ?>