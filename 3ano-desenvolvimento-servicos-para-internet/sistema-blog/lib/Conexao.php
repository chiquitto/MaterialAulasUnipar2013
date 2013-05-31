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
            parent::__construct('mysql:host=localhost;dbname=blog', 'root', 'teste');
        } catch (PDOException $e) {
            echo "Conexão falhou. Erro: " . $e->getMessage();
            return false;
        }
    }

    //aqui criamos um objeto de fechamento da conexão
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

    public function executar($sql) {
        try {
            return $this->query($sql);
        } catch (PDOException $e) {
            die($e);
        }
    }

}