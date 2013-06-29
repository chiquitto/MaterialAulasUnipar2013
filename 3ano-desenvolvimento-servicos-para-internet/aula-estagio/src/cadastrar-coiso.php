<?php
require 'config.php';

$formTemErros = false;
$formMsgOk = '';
$errosHtml = array();

$frm = array(
    'idcoiso' => 0,
    'idcategoria' => 0,
    'nome' => '',
    'descricao' => '',
    'status' => 'I',
);

if (isset($_GET['idcoiso'])) {
    $frm['idcoiso'] = (int) $_GET['idcoiso'];
}

if ($frm['idcoiso'] > 0) {
    $coisoDao = new Model_DAO_Coiso();
    $coisos = $coisoDao->request("idcoiso = {$frm['idcoiso']}");

    if (count($coisos) == 0) {
        $frm['idcoiso'] = 0;

        $formTemErros = true;
        $errosHtml = array('O registro que você tentou acessar não existe');
    } else {
        $coisoDO = $coisos[0];
        $frm['idcategoria'] = $coisoDO->idcategoria;
        $frm['nome'] = $coisoDO->nome;
        $frm['descricao'] = $coisoDO->descricao;
        $frm['status'] = $coisoDO->status;
    }
}

if ($_POST) {
    $frm['idcategoria'] = 1;
    $frm['nome'] = $_POST['nome'];
    $frm['descricao'] = $_POST['descricao'];
    if (isset($_POST['ativo'])) {
        $frm['status'] = 'A';
    }
    else {
        $frm['status'] = 'I';
    }

    $model = new Model_Coiso();

    if ($frm['idcoiso'] > 0) {
        $ok = $model->editar($frm);
    } else {
        $ok = $model->cadastrar($frm);
    }

    if ($ok !== false) {
        $formMsgOk = 'O registro foi salvo';
    } else {
        $formTemErros = TRUE;
        $errosHtml = $model->pegarErros();
    }
}

$view = View::getInstance();
$view->assign('valores', $frm);
$view->assign('formTemErros', $formTemErros);
$view->assign('formMsgOk', $formMsgOk);
$view->assign('errosHtml', $errosHtml);
$view->display('cadastrar-coiso.tpl');