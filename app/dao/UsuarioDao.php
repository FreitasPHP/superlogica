<?php

require_once 'AbstractDao.php';

/**
 * [Description UsuarioDao]
 */
final class UsuarioDao extends AbstractDao
{
    /**
     * @param string $nomeDaTabela
     * @param array $informacao
     * 
     * @return bool
     */
    public function select(string $nomeDaTabela, array $informacao): bool
    {
        return parent::select($nomeDaTabela, $informacao);
    }

    /**
     * @param string $nomeDaTabela
     * @param array $informacao
     * 
     * @return int
     */
    public function insert(string $nomeDaTabela, array $informacao): int
    {
        $sql = "INSERT INTO {$nomeDaTabela} (name, userName, zipCode, email, password) VALUES (?, ?, ?, ?, ?)";

        try{
            $p_sql = $this->getInstance()->prepare($sql);
            $p_sql->bindValue(1, $informacao['name']);
            $p_sql->bindValue(2, $informacao['userName']);
            $p_sql->bindValue(3, $informacao['zipCode']);
            $p_sql->bindValue(4, $informacao['email']);
            $p_sql->bindValue(5, $informacao['password']);
            $p_sql->execute();

            return $this->getInstance()->lastInsertId();

        } catch(PDOException $exception){
            return 0;
        }
    }
}
