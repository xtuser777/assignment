<?php

use App\Controllers\TeatchersController;

$teatchersController = new TeatchersController();

$filters = [];
foreach ($_GET as $key => $value) {
    if (
        strcmp($key, 'resource') !== 0 &&
        strcmp($key, 'action') !== 0 &&
        str_ends_with($key, '_sort') === false &&
        !empty($value)
    ) {
        $filters[$key] = $value;
    }
}
$filters['idano'] = 2025;
$orderBy = [];
foreach ($_GET as $key => $value) {
    if (str_ends_with($key, '_sort')) {
        $column = str_replace('_sort', '', $key);
        $orderBy[$column] = $value;
    }
}
$teatchers = $teatchersController->findMany($filters, $orderBy);

?>
<h3 class="text-center">Cadastro de Professores</h3>
<hr>
<form action="?resource=teatchers&action=index" method="get">
    <div class="row">
        <div class="col-sm-12">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </div>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ano</th>
                <th>Ações</th>
            </tr>
            <tr>
                <th><select class="form-control" name="nome_sort" id="nome_sort">
                        <option value="">Ordenar por Nome</option>
                        <option value="ASC" <?php if (isset($_GET['nome_sort']) && $_GET['nome_sort'] === 'ASC') echo 'selected'; ?>>Crescente</option>
                        <option value="DESC" <?php if (isset($_GET['nome_sort']) && $_GET['nome_sort'] === 'DESC') echo 'selected'; ?>>Decrescente</option>
                    </select></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teatchers as $teatcher): ?>
                <tr>
                    <td><?php echo htmlspecialchars($teatcher->name); ?></td>
                    <td><?= $teatcher->year_id ?></td>
                    <td>
                        <a href="?resource=teatchers&action=edit&id=<?php echo $teatcher->id; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="?resource=teatchers&action=delete&id=<?php echo $teatcher->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este professor?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>