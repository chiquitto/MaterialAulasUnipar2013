<?php

class NoticiaController extends Zend_Controller_Action {

	public function init() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->Redirector->gotoSimpleAndExit('login', 'usuario');
        }
    }

    public function indexAction() {
        $adapter = Zend_Db_Table::getDefaultAdapter();
        
        $select = 
                $adapter
                ->select()
                //->order('cdnoticia DESC')
                ->from(
                        array('n' => 'noticia'),
                        array('cdnoticia', 'nome', 'datacadastro', 'count(cdnoticia) as contador')
                 )
                ->joinInner(
                        array('c' => 'categoria'),
                        'c.cdcategoria = n.cdcategoria', 
                        array('categoria')
                        )
                ->limit(3, 3)
                //->where('c.cdcategoria = :cdcat')
                //->orWhere('n.cdnoticia > :cdnotmin')
                ->group('n.cdcategoria')
                //->where("n.cdnoticia = ?", new Zend_Db_Expr('c.cdcategoria'))
                //->where('c.cdcategoria IN (?)', array(3,4))
                ;
        
        //echo $select;exit;
        
        //$select->bind(array(
        //    ':cdcat' => 4,
        //    ':cdnotmin' => 2,
        //));
        $resultado = $select->query();
        $noticias = $resultado->fetchAll();
        //print_r($noticias);
        
        //exit;
        
        //$sql = "SELECT `n`.`cdnoticia`, `n`.`nome`, `n`.`datacadastro`, count(cdnoticia) AS `contador`, `c`.`categoria` FROM `noticia` AS `n` INNER JOIN `categoria` AS `c` ON c.cdcategoria = n.cdcategoria WHERE (n.cdnoticia = c.cdcategoria) GROUP BY `n`.`cdcategoria` ";
        
        //$noticias = $adapter->query($sql)->fetchAll();

        $this->view->lista = $noticias;
    }

    public function cadastrarAction() {
        $formCadastrar = new Application_Form_Noticia_Cadastrar();

        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();

            if ($formCadastrar->isValid($dados)) {
                $dadosFiltrados = $formCadastrar->getValues();

                $noticiaModel = new Application_Model_Noticia();
                $cdnoticia = $noticiaModel->cadastrar($dadosFiltrados);

                if ($cdnoticia === FALSE) {
                    $this->view->msg = 'Não foi possível inserir o registro no BD';
                } else {
                    $this->view->msg = "Inseriu o registro com o ID = $cdnoticia";
                }
            }
        }

        $this->view->form = $formCadastrar;
    }

    public function editarAction() {
        $cdnoticia = (int) $this->getRequest()->getParam('cdnoticia', 0);

        $tabela = new Application_Model_Table_Noticia();

        $registros = $tabela->fetchAll("cdnoticia = $cdnoticia");

        if ($registros->count() != 1) {
            echo 'Registro inexistente';
            exit;
        }

        $registro = $registros->current();

        $form = new Application_Form_Noticia_Editar();

        if ($this->getRequest()->isPost()) {
            $parametros = $this->getRequest()->getParams();
            if ($form->isValid($parametros)) {
                $parametrosFiltrados = $form->getValues();

                $noticiaModel = new Application_Model_Noticia();
                $ok = $noticiaModel->editar($parametrosFiltrados);

                if ($ok === false) {
                    $this->view->msg = 'Não foi possível atualizar o registro no BD';
                } else {
                    $this->view->msg = "Atualizou o registro";
                }
            }
        } else {
            $array = $registro->toArray();
            $array['data'] = $array['datacadastro'];
            $form->populate($array);
        }

        $this->view->formulario = $form;
    }

}

