<?php

/**
 * [Classe com as constantes do sistema]
 */
abstract class Config
{
    /**
    * [Constantes para configuracao do Banco de Dados]
    */
    const DB_HOST = 'localhost';
    const DB_NAME = 'superlogica';
    const DB_USER = 'root';
    const DB_PASS = '';

    /**
    * [Constantes para identificacao das entidades do sistema]
    */
    const ENTITY_USUARIO = 'usuario';
 
    /**
    * [Constantes para identificacao das acoes de formulario]
    */
    const ACTION_GET    = 'get';
    const ACTION_INSERT = 'insert';
 
    // Path para todos os submits de formulario(API).
    const ACTION_FORM   = 'app/api.php';

    const PAGE_TITLE    = 'Prova Superl&oacute;gica';  
}