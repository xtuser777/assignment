<?php

session_start();

$_SESSION['USERNAME'] = 'SEDUC';
$_SESSION['YEAR'] = '2025';

require __DIR__. '/vendor/autoload.php';

$resource = filter_input(INPUT_GET, 'resource');
$action = filter_input(INPUT_GET, 'action');

$title = 'Home';

switch ($resource) {
    case 'teatchers':
        switch ($action) {
            case 'index':
                $title = 'Professores';
                break;
            case 'create':
                $title = 'Criar Professor';
                break;
        }
        break;
}

$viewPath = __DIR__ . "/src/views/{$resource}/{$action}.view.php";  

include_once './src/views/layout.php';