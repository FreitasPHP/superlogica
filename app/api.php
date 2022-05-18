<?php

require_once 'Config.php';
require_once 'app/controller/UsuarioController.php';

$dados = $_POST;
$usuarioController = new UsuarioController(); 

$dados['id'] = $usuarioController->insert(Config::ENTITY_USUARIO, $dados);

echo json_encode($usuarioController->select(Config::ENTITY_USUARIO, $dados));