<?php

class Application_Model_Table_Noticia
extends Zend_Db_Table_Abstract {
	protected $_name = 'noticia';
	protected $_primary = array('cdnoticia');
}