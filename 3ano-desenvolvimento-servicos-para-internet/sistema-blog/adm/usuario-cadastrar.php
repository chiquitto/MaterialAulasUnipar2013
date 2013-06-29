<?php
require '../config.php';

$formMostrarMsg = false;
$formTemErros = false;
$formMsgOk = '';

if ($_POST) {
    $dados = array(
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'login' => $_POST['login'],
        'senha' => $_POST['senha'],
    );
    
    $daoUsuario = new DAO_Usuario();
    $id = $daoUsuario->cadastrar($dados);
    
    if ($id === false) {
        echo join('; ', $daoUsuario->erros);
    }
    else {
        echo 'Cadastrado com o ID ' . $id;
    }
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de usuário</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../static/twitter-bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../static/estilo.css" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <h1>Cadastro de usuário</h1>

<?php if ($formTemErros == true) { ?><div class="alert alert-error"><strong>Aviso:</strong> <?php echo join('; ', $erros); ?></div><?php } ?>

<?php if ($formMsgOk != '') { ?><div class="alert alert-success"><strong>Parabéns: </strong><?php echo $formMsgOk; ?></div><?php } ?>

            <form class="" method="post">
                <fieldset>
                    <legend>Dados pessoais</legend>

                    <div class="control-group">
                        <label class="control-label" for="idNome">Nome</label>
                        <div class="controls">
                            <input type="text" name="nome" id="idNome">
                            <!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="idEmail">Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="idEmail">
                            <!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Dados de acesso</legend>

                    <div class="control-group">
                        <label class="control-label" for="idLogin">Login</label>
                        <div class="controls">
                            <input type="text" name="login" id="idLogin">
                            <!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="idSenha">Senha</label>
                        <div class="controls">
                            <input type="password" name="senha" id="idSenha">
                            <!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>
                </fieldset>

                

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn">Cancelar</button>
                </div>
            </form>
        </div>
    </body>
</html>