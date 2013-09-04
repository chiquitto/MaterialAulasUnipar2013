<?php

/**
 * /private/application/controllers/FormController.php
 */

class FormController extends Zend_Controller_Action {

    /**
     * @link localhost/form/testar
     */
    public function testarAction() {
        $form = new Application_Form_Cadastrar();
        
        if ($this->getRequest()->isPost()) {
            $valores = $this->getRequest()->getParams();
            
            if ($form->isValid($valores)) {
                
                $valoresForm = $form->getValues();
                
                print_r($valores);
                print_r($valoresForm);
                
                exit;
            }
        }
        
        $this->view->form1 = $form;
    }

}