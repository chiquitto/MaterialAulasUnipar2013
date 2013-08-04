<?php

class Application_Model_Table_Noticia extends Zend_Db_Table_Abstract {

	protected $_name = 'noticia';
	protected $_primary = 'cdnoticia';
	
	protected $_referenceMap	= array(
		'ref_categoria' => array(
			'columns'		   => array('cdcategoria'),
			'refTableClass'	 => 'Application_Model_Table_Categoria',
			'refColumns'		=> array('cdcategoria')
		)
	);
	
}