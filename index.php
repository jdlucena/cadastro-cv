<?php

require_once 'vendor/autoload.php';

require_once 'config/config.php';

require_once 'classes/Conexao.php';

require_once 'classes/Cadastrar.php';

use PayTour\Classes\Cadastrar;

$cadastrar = new Cadastrar();

include("views/index.php");
