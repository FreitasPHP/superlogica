<?php

require_once 'dao/UsuarioDao.php';

/**
 * [Description UsuarioController]
 */
final class UsuarioController
{
    /**
     * @var [UsuarioDao]
     */
    private $dao;

    /**
     */
    public function __construct()
    {
        $this->dao = new UsuarioDao();
    }    

    /**
     * @param string $nomeDaTabela
     * @param array $informacao
     * 
     * @return int
     */
    public function insert(string $nomeDaTabela, array $informacao): int
    {
        return $this->dao->insert($nomeDaTabela, $informacao);
    }

    /**
     * @param string $nomeDaTabela
     * @param array $informacao
     * 
     * @return bool
     */
    public function select(string $nomeDaTabela, array $informacao): bool
    {
        return $this->dao->select($nomeDaTabela, $informacao);
    }
}