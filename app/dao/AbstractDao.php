<?php

require_once 'Config.php';

/**
 * [Description AbstractDao]
 */
abstract class AbstractDao
{   
    /**
     * @var [PDO]
     */
    private $connector;
    
    /**
     * @return PDO|null
     */
    protected function getInstance(): ?PDO
    {
        if($this->connector === null){
            $this->connector = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME, Config::DB_USER, Config::DB_PASS);
            $this->connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }       

        return $this->connector;
    }

    
    /**
     * @param string $nomeDaTabela
     * @param array $informacao
     * 
     * @return bool
     */
    protected function select(string $nomeDaTabela, array $informacao): bool
    {
        $id  = $informacao['id'];
        $sql = "SELECT * FROM {$nomeDaTabela} WHERE id = {$id}";
        
        try{
            $p_sql = $this->getInstance()->prepare($sql);
            $p_sql->execute();

            return true;

        } catch(PDOException $exception){
            return false;
        }
    }
        
    /**
     * @param string $nomeDaTabela
     * @param array $informacao
     * 
     * @return int
     */
    abstract protected function insert(string $nomeDaTabela, array $informacao): int;
}