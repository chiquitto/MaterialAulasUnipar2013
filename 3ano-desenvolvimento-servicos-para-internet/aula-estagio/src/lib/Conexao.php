<?php

/**
 * Description of Conexao
 *
 * @author Chiquitto <chiquitto@gmail.com>
 */
class Conexao extends PDO {

    private static $_instance;

    function __construct() {
        try {
            parent::__construct('mysql:host=localhost;dbname=coiso', 'root', 'teste');
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<pre>Conexão falhou\n\n", $e;
            exit;
        }
    }

    function __destruct() {
        
    }

    /**
     * 
     * @return Conexao
     */
    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * 
     * @param string $sql
     * @return PDOStatement
     */
    public function executar($sql) {
        return $this->query($sql);
    }

}