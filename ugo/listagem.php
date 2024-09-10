<?php 
require_once('pedacos/lay.php');
require_once('pedacos/conexao.php');

$sql = "SELECT `id`, `nome`, `urlfoto`, `descricao` FROM `pratos` ORDER BY nome";
$stmt = $conn->query($sql);
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Listagem</h1>
</div>
<div class="table-responsive">
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col" style="width: 10%">ID</th>
                <th scope="col" style="width: 25%">Nome</th>
                <th scope="col" style="width: 15%">Imagens</th>
                <th scope="col" style="width: 25%">Descrição</th>
                <th scope="col" style="width: 25%" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $stmt->fetch()){
            ?>
            <tr>
                <td><?= $row["id"]?></td>
                <td><?= $row["nome"]?></td>
                <td class="al-ign-top">
                    <a href="<?= $row["urlfoto"]?>" target="_blank">
                        Link da imagem
                    </a>
                </td>
                <td><? $row["descricao"]?></td>
                <td>
                    <a type="button" class="btn btn-warning">
                        editar
                    </a>
                </td>
                <td>
                    <a type="button" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php require_once('pedacos/out.php'); ?>