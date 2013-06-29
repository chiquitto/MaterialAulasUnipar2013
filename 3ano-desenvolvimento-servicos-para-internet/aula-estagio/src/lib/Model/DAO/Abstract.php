<?php

abstract class Model_DAO_Abstract {
    protected $tabela;
    protected $pk;

    /**
     * Cadastra o $objetoDO no BD
     * 
     * @param DO_Abstract $objetoDO
     * @return mixed ID do auto-increment ou FALSE
     */
    public function create(Model_DO_Abstract $objetoDO) {
        $valores = $objetoDO->getTodos();
        $colunas = array_keys($valores);
        
        // cola peças de um array
        $colunas = join(',', $colunas);
        
        foreach($valores as $coluna => $valor) {
            if( !is_numeric($valor) ) {
               $valores[$coluna] = "'" . $valor . "'"; 
            }
        }
        $valores = join(',', $valores);
        
        $sql = 'INSERT INTO '
                . $this->tabela
                . ' ('
                . $colunas
                . ') VALUES ('
                . $valores
                . ')';
        
        $con = Conexao::getInstance();
        $ok = $con->executar($sql);
        
        if ($ok === FALSE) {
            return FALSE;
        }
        
        return $con->lastInsertId();
    }
    
    public function request($where = NULL, $order = NULL) {
        $sql = 'SELECT * FROM '
                . $this->tabela
                ;
        
        if ($where !== NULL) {
            $sql .= ' WHERE ' . $where;
        }
        if ($order !== NULL) {
            $sql .= ' ORDER BY ' . $order;
        }

        $con = Conexao::getInstance();
        $className = strtr(get_class($this), array('DAO' => 'DO'));
        $resultados = $con->executar($sql)->fetchAll(PDO::FETCH_CLASS, $className);
        return $resultados;
    }
    
    public function update(Model_DO_Abstract $objetoDO) {
        $valores = $objetoDO->getTodos();
        
        foreach($valores as $coluna => $valor) {
            if ($coluna == $this->pk) {
                $where = $this->pk . '=' . $valor;
                
                unset($valores[$coluna]);
                continue;
            }
            
            $valores[$coluna] = $coluna . '=';
            
            if( !is_numeric($valor) ) {
                $valores[$coluna] .= "'" . $valor . "'";
            }
            else {
                $valores[$coluna] .= $valor;
            }
        }
        $valores = join(',', $valores);
        
        $sql = 'UPDATE '
                . $this->tabela
                . ' SET ' . $valores
                . ' WHERE ' . $where
            ;
        
        $con = Conexao::getInstance();
        return $con->executar($sql);
    }
    
    public function delete($where) {
        $sql = 'DELETE FROM '
                . $this->tabela
                . ' WHERE ' . $where
                ;
        
        $con = Conexao::getInstance();
        return $con->executar($sql);
    }
}