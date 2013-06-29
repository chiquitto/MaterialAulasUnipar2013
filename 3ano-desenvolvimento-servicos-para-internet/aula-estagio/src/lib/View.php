<?php

require DIRETORIO_AUTOLOAD . '/Smarty/Smarty.class.php';

class View extends Smarty {

    private static $_instance;

    function __construct() {
        parent::__construct();
        
        //$smarty->force_compile = true;
        $this->debugging = false;
        $this->caching = false;
        $this->cache_lifetime = 120;
        
        $this->setTemplateDir(DIRETORIO_SISTEMA . '/templates');
        $this->setCompileDir(DIRETORIO_SISTEMA . '/tmp/templates_c');
        $this->setCacheDir(DIRETORIO_SISTEMA . '/tmp/cache');
    }

    /**
     * 
     * @return View
     */
    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}