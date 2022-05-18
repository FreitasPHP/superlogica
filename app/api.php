<?php

require_once 'Config.php';
require_once 'controller/UsuarioController.php';

$dados = $_POST;
$usuarioController = new UsuarioController();

$dados['id'] = $usuarioController->insert(Config::ENTITY_USUARIO, $dados);

if ($usuarioController->select(Config::ENTITY_USUARIO, $dados))
    $message = 'Registro inserido com sucesso!';
else
    $message = 'Falha ao cadastrar! Por favor entre em contato com o Administrador do Sistema.';

echo implode('', [
    "<script>",
    "alert('{$message}');",
    "location.href='../';",
    "</script>"
]);
