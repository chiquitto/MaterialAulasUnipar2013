<?php

abstract class DAO_Abstract {
	protected $_local;
	protected $_id;

	public function create(DO_Abstract $dados){}
	public function request($where = null, $order = null, $limit = null){}
	public function update(DO_Abstract $dados, $where = null){}
	public function delete($where){}
}