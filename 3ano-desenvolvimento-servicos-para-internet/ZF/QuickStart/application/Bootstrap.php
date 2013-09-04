<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }
	
	protected function _initNavigation() {
		$this->bootstrap('layout');
		$arquivoXML = APPLICATION_PATH . '/configs/navigation.xml';
		
		$config = new Zend_Config_Xml($arquivoXML, 'nav');
		$container = new Zend_Navigation($config);
		
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		
		$view->navigation($container);
	}
}

