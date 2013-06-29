<?php

/**
 * Description of Coiso
 *
 * @author Alisson Chiquitto<chiquitto@chiquitto.com.br>
 */
class Model_Coiso extends Model_Abstract {

    const ERRO_CATEGORIA_VAZIO = 1101;
    const ERRO_NOME_VAZIO = 1102;
    const ERRO_NOME_JA_EXISTE = 1103;

    public function cadastrar($valores) {
        $this->limpaErros();
        if (!$this->validar($valores)) {
            return FALSE;
        }

        // Cadastrar no BD
        $coisoDO = new Model_DO_Coiso($valores);
        $coisoDAO = new Model_DAO_Coiso();

        try {
            $idcoiso = $coisoDAO->create($coisoDO);
        } catch (PDOException $exc) {
            $idcoiso = false;

            if ($idcoiso === false) {
                $this->adicionarErro(self::ERRO_BD, 'Erro para inserir registro: ' . $exc->getMessage());
                return FALSE;
            }
        }

        return $idcoiso;
    }
    
    public function deletar($idcoiso) {
        $dao = new Model_DAO_Coiso();
        try {
            $dao->delete("idcoiso = $idcoiso");
            return TRUE;
        } catch (PDOException $exc) {
            $this->adicionarErro(self::ERRO_BD, 'Erro para apagar registro: ' . $exc->getMessage());
            return FALSE;
        }
    }

    public function editar($valores) {
        $this->limpaErros();
        if (!$this->validar($valores)) {
            return FALSE;
        }

        $coisoDO = new Model_DO_Coiso($valores);
        $dao = new Model_DAO_Coiso();

        try {
            $dao->update($coisoDO);
            return TRUE;
        } catch (PDOException $exc) {
            $this->adicionarErro(self::ERRO_BD, 'Erro para alterar registro: ' . $exc->getMessage());
            return FALSE;
        }
    }

    private function validar($valores) {
        if ($valores['nome'] == '') {
            $this->adicionarErro(self::ERRO_NOME_VAZIO, 'O nome não pode ser vazio');
        }
        if ($valores['idcategoria'] == 0) {
            $this->adicionarErro(self::ERRO_CATEGORIA_VAZIO, 'A categoria não pode ser vazio');
        }

        if (($valores['nome'] != '') and ($valores['idcategoria'] > 0)) {
            $dao = new Model_DAO_Coiso();

            $where = "(nome = '{$valores['nome']}') AND (idcategoria = {$valores['idcategoria']}) AND (idcoiso != {$valores['idcoiso']})";

            $coisos = $dao->request($where);
            if (count($coisos) > 0) {
                $this->adicionarErro(self::ERRO_NOME_JA_EXISTE, 'Este coiso já esta cadastrado');
            }
        }

        if ($this->temErros()) {
            return FALSE;
        }
        return TRUE;
    }
}