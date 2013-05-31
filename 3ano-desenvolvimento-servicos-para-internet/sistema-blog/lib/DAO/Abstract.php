<?php

abstract class DAO_Abstract {
    protected $tabela;
    protected $pk;

    public function create(DO_Abstract $objetoDO) {
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
    
    public function request($where = null) {
        $sql = 'SELECT * FROM '
                . $this->tabela
                ;
        
        if ($where !== null) {
            $sql .= ' WHERE ' . $where;
        }

        $con = Conexao::getInstance();
        $resultados = $con->executar($sql)->fetchAll();
        $className = get_class($this);
        foreach($resultados as $chave => $resultado) {
            $resultados[$chave] = new $className($resultado);
        }
        return $resultados;
    }
    
    public function update(DO_Abstract $objetoDO) {
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
        $con->executar($sql);
    }
    
    public function delete($where) {
        $sql = 'DELETE FROM '
                . $this->tabela
                . ' WHERE ' . $where
                ;
        
        $con = Conexao::getInstance();
        $con->executar($sql);
    }
}