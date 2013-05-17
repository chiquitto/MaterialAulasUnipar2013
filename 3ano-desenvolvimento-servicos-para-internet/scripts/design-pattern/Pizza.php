<?php

interface InterfacePizza {
    public function prepararMassa();
    public function rechear();
    public function assar();
    public function cortar();
    public function encaixotar();
}

abstract class Pizza implements InterfacePizza {
    public function assar() {
        echo 'Assar pizza<br>';
    }

    public function cortar() {
        echo 'Cortar pizza<br>';
    }

    public function encaixotar() {
        echo 'Encaixotar pizza<br>';
    }

    public function prepararMassa() {
        echo 'Preparar massa<br>';
    }
}

class PizzaBacon extends Pizza {
    public function rechear() {
        echo 'Rechear pizza com bacon<br>';
    }
}

class PizzaCalabresa extends Pizza {
    public function rechear() {
        echo 'Rechear pizza com calabresa<br>';
    }
}

class PizzaFactory {
    public static function factory($recheio) {
        /*switch($recheio) {
            case 'bacon':
                $pizza = new PizzaBacon();
                break;
            case 'calabresa':
                $pizza = new PizzaCalabresa();
                break;
        }*/
        
        $recheio = ucfirst($recheio);
        $nomeClasse = 'Pizza' . $recheio;
        $pizza = new $nomeClasse();
        
        $pizza->prepararMassa();
        $pizza->rechear();
        $pizza->assar();
        $pizza->cortar();
        $pizza->encaixotar();
    }
}

$pizza = PizzaFactory::factory('bacon');
$pizza = PizzaFactory::factory('calabresa');