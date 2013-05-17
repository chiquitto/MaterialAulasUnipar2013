<?php

interface Persistencia_Driver_Interface {
	public function create($local, DO_Abstract $dados);
	public function request($local, $where = null, $order = null, $limit = null);
	public function update($local, DO_Abstract $dados, $where = null);
	public function delete($local, $where);
}