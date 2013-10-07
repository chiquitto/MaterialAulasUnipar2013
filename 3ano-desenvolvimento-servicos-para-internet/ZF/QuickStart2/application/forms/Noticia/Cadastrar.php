<?php

class Application_Form_Noticia_Cadastrar
extends Zend_Form {
	public function __construct() {
		parent::__construct();
		
		$alphaValidador = new Zend_Validate_Alpha();
		//$alphaValidador->setAllowWhiteSpace(true);
		
		$stringLengthValidador = new Zend_Validate_StringLength(array(
			'min' => 50,
			'max' => 100,
		));
                
		$letraFiltro = new Zend_Filter_Alpha();
                
                $nullFiltro = new Zend_Filter_Null();
		
		$dataValidador = new Zend_Validate_Date();
		
		$nomeElemento = new Zend_Form_Element_Text('nome', array(
			'label' => 'Nome da noticia',
			'required' => true
		));
		$this->addElement($nomeElemento);
		$nomeElemento->addValidator($alphaValidador);
		$nomeElemento->addFilter($letraFiltro);
                
                $tabelaCategoria = new Application_Model_Table_Categoria();
                $categoriaConjunto = $tabelaCategoria
                        ->fetchAll(null, 'categoria')
                        ;
                $opcoes = array(
                    0 => 'Selecione uma categoria',
                );
                foreach($categoriaConjunto as $categoriaRegistro) {
                    $opcoes[$categoriaRegistro->cdcategoria]
                            = $categoriaRegistro->categoria;
                }
                
                $categoriaElemento =
                        new Zend_Form_Element_Select('cdcategoria', array(
                            'label' => 'Categoria',
                            'multioptions' => $opcoes,
                            'required' => true,
                        ));
                $this->addElement($categoriaElemento);
                $categoriaElemento->addFilter($nullFiltro);
		
		$textoElemento = new Zend_Form_Element_Textarea('texto', array(
			'label' => 'Texto da noticia',
			'required' => true
		));
		$this->addElement($textoElemento);
		$textoElemento->addValidator($stringLengthValidador);
		
		$dataElemento = new Zend_Form_Element_Text('data', array(
			'label' => 'Data de cadastro',
			'required' => true
		));
		$this->addElement($dataElemento);
		$dataElemento->addValidator($dataValidador);
		
		$submitElemento = new Zend_Form_Element_Submit('submit', array(
			'label' => 'Enviar informações'
		));
		$this->addElement($submitElemento);
	}
}

/*
  `nome` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `datacadastro` date NOT NULL,
  `cdcategoria` int(11) NOT NULL,
*/