<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->Redirector->gotoSimpleAndExit('login', 'usuario');
        }
    }

    public function indexAction() {
        // action body
    }

}