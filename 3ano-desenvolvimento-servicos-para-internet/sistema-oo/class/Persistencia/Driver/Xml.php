<?php

class Persistencia_Driver_Xml implements Persistencia_Driver_Interface {
	public function create(DO_Abstract $dados){}
	public function request($where = null, $order = null, $limit = null){}
	public function update(DO_Abstract $dados, $where = null){}
	public function delete($where){}
}