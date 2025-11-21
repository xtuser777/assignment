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
        if (str_starts_with($key, 'id') === true) {
            $filters[$key] = intval($value);
        } else {
            $filters[$key] = $value;
        }
    }
}
$nome = array_key_exists('nome', $filters) ? $filters['nome'] : '';
$filters['idano'] = intval($_SESSION['YEAR']);
$orderBy = [];
foreach ($_GET as $key => $value) {
    if (
        str_ends_with($key, '_sort') &&
        !empty($value)
    ) {
        $column = str_replace('_sort', '', $key);
        $orderBy[$column] = $value;
    }
}
$teatchers = $teatchersController->findMany($filters, $orderBy);

?>
<h3 class="text-center">Cadastro de Professores</h3>
<hr>
<form action="" method="get">
    <input type="hidden" name="resource" value="teatchers">
    <input type="hidden" name="action" value="index">
    <div class="row">
        <div class="col-sm-12">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" value="<?=$nome?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
            <a role="button" class="btn btn-success" href="/?resource=teatchers&action=create">Novo</a>
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
                        <option value="ASC" <?php if (isset($_GET['nome_sort']) && $_GET['nome_sort'] === 'ASC')
                            echo 'selected'; ?>>Crescente</option>
                        <option value="DESC" <?php if (isset($_GET['nome_sort']) && $_GET['nome_sort'] === 'DESC')
                            echo 'selected'; ?>>Decrescente</option>
                    </select></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teatchers as $teatcher): ?>
                <tr>
                    <td><?= htmlspecialchars($teatcher->nome); ?></td>
                    <td><?= $teatcher->idano ?></td>
                    <td>
                        <a href="?resource=teatchers&action=edit&id=<?php echo $teatcher->idprofessor; ?>"
                            class="btn btn-sm btn-warning">Editar</a>
                        <a href="?resource=teatchers&action=delete&id=<?php echo $teatcher->idprofessor; ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Tem certeza que deseja excluir este professor?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>