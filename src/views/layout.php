<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atribuição - <?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid ps-lg-5 pe-lg-5">
            <a class="navbar-brand" href="#">Atribui</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastros
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?resource=teatchers&action=index">Professores</a></li>
                            <li><a class="dropdown-item" href="#">Títulos</a></li>
                            <li><a class="dropdown-item" href="#">Unidades</a></li>
                            <li><a class="dropdown-item" href="#">Anos</a></li>
                            <li><a class="dropdown-item" href="#">Bloqueia cadastros</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contagem
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Pontuação</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Relatórios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Relação de professores</a></li>
                            <li><a class="dropdown-item" href="#">Classificação</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Segurança
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Alterar senha</a></li>
                            <li><a class="dropdown-item" href="#">Usuários</a></li>
                            <li><a class="dropdown-item" href="#">Usuário por unidade</a></li>
                            <li><a class="dropdown-item" href="#">Aplicações</a></li>
                            <li><a class="dropdown-item" href="#">Sincronizar aplicações</a></li>
                            <li><a class="dropdown-item" href="#">Grupos</a></li>
                            <li><a class="dropdown-item" href="#">Grupos/Aplicações</a></li>
                            <li><a class="dropdown-item" href="#">Log</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuário: <?= $_SESSION['USERNAME']; ?> | Ano: <?= $_SESSION['YEAR']; ?>   
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container mt-2"><?php include_once $viewPath ?></section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>