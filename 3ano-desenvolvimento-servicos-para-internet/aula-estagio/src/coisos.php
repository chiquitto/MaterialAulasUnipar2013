<?php

require 'config.php';

$formTemErros = false;
$formMsgOk = '';
$errosHtml = array();

$act = isset($_GET['act']) ? $_GET['act'] : '';
$idcoiso = isset($_GET['idcoiso']) ? (int) $_GET['idcoiso'] : 0;

switch ($act) {
    case 'del':
        $coisoModel = new Model_Coiso();
        $ok = $coisoModel->deletar($idcoiso);

        if ($ok !== false) {
            $formMsgOk = 'O registro foi apagado';
        } else {
            $formTemErros = TRUE;
            $errosHtml = $coisoModel->pegarErros();
        }
        break;

    default:
        break;
}


$view = View::getInstance();

$coisoDAO = new Model_DAO_Coiso();
$coisos = $coisoDAO->request(NULL, 'idcoiso DESC');
$view->assign('coisos', $coisos);

$view->assign('formTemErros', $formTemErros);
$view->assign('formMsgOk', $formMsgOk);
$view->assign('errosHtml', $errosHtml);

$view->display('coisos.tpl');