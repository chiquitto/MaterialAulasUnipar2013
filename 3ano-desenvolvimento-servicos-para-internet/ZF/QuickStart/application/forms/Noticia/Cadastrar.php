<?php

class Application_Form_Noticia_Cadastrar extends Zend_Form {
	public function __construct($options = null) {
		parent::__construct($options);
		
		//$this->setAction('/QuickStart/public/noticia/cadastrar');
		
		$naoVazio = new Zend_Validate_NotEmpty();
		$trimFilter = new Zend_Filter_StringTrim();
		$upperFilter = new Zend_Filter_StringToUpper();
		$htmlFilter = new Zend_Filter_StripTags();
		$nullFilter = new Zend_Filter_Null();
		
		$tabelaCategoria = new Application_Model_Table_Categoria();
		
		// pesquisar no bd
		// select * from categoria order by categoria
		$categoriaPesquisa = $tabelaCategoria->fetchAll(null, 'categoria');
		$categorias = array();
		foreach( $categoriaPesquisa as $linha ) {
			$categorias[$linha->cdcategoria] =
				$linha->categoria;
		}
		
		$categoriaElemento = new Zend_Form_Element_Select('cdcategoria', array(
			'label' => 'Categoria',
			'multioptions' => $categorias,
			'required' => true,
		));
		$this->addElement($categoriaElemento);
		$categoriaElemento
			->addFilter($nullFilter)
		;
		
		$nomeElemento = new Zend_Form_Element_Text('nome', array(
			'label' => 'Nome da noticia',
			'required' => true
		));
		$this->addElement($nomeElemento);
		$nomeElemento
			->addValidator($naoVazio)
			->addValidator(new Zend_Validate_StringLength(array('min' => 10)));
		$nomeElemento
			->addFilter($trimFilter)
			->addFilter($upperFilter);
		
		$textoElemento = new Zend_Form_Element_Textarea('texto', array(
			'label' => 'Texto da noticia',
			'required' => true
		));
		$this->addElement($textoElemento);
		$textoElemento->addValidator($naoVazio);
		$textoElemento->addFilter($htmlFilter);
		
		$submitElemento = new Zend_Form_Element_Submit('submit', array(
			'label' => 'Enviar'
		));
		$this->addElement($submitElemento);
	}
}
