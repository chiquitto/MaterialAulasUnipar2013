<?php

/**
 * Description of Post
 *
 * @author Alisson Chiquitto<chiquitto@chiquitto.com.br>
 */
class Controller_Post extends Controller_Abstract {

    public function cadastrarAction() {
        $dados = array();
        
        if ($_POST) {
            $ativo = '0';
            if (isset($_POST['ativo'])) {
                $ativo = '1';
            }

            $destaque = '0';
            if (isset($_POST['destaque'])) {
                $destaque = '1';
            }
            
            $dados = array(
                'nome' => $_POST['nome'],
                'resumo' => $_POST['resumo'],
                'texto' => $_POST['texto'],
                'ativo' => $ativo,
                'destaque' => $destaque,
            );
            
            $model = new Model_Post();
            if ($model->cadastrar($dados)) {
                $this->view->setParametro('formMsgOk', 'Os dados foram salvos');
            }
            else {
                $this->view->setParametro('erro', 1);
                $this->view->setParametro('formMsgErros', $model->getErros());
            }
        }
        
        $this->view->setParametro('dados', $dados);

        $this->view->mostrar('post-cadastrar');
    }
    
    public function listarAction() {
        $model = new Model_Post();
        
        $this->view->setParametro('posts', $model->pegarTodos());
        
        $this->view->mostrar('post-listar');
    }

}