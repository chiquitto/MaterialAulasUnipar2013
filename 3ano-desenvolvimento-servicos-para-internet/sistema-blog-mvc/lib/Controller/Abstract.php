<?php

/**
 * Description of Abstract
 *
 * @author Alisson Chiquitto<chiquitto@chiquitto.com.br>
 */
abstract class Controller_Abstract {
    
    /**
     *
     * @var View
     */
    protected $view;
    
    public function __construct() {
        $this->view = new View();
    }
}