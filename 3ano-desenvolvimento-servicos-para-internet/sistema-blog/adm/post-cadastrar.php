<?php
require '../config.php';

$formMostrarMsg = false;
$formTemErros = false;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de post</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="../static/twitter-bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../static/estilo.css" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <h1>Cadastro de post</h1>

<!--<div class="alert alert-error"><strong>Aviso:</strong> Por favor corrija os erros de preenchimento do formulário.</div>-->
<!--<div class="alert alert-success"><strong>Parabéns: </strong>Todas as informações estão corretas.</div>-->

            <form class="" method="post">
                <fieldset>
                    <legend>Cabeçalho</legend>

                    <div class="control-group">
                        <label class="control-label" for="idNome">Nome</label>
                        <div class="controls">
                            <input type="text" name="nome" id="idNome">
                            <!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="idResumo">Resumo</label>
                        <div class="controls">
                            <input type="text" name="resumo" id="idResumo">
                            <!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Conteúdo</legend>

                    <div class="control-group">
                        <label class="control-label" for="idTexto">Texto</label>
                        <div class="controls">
                            <textarea class="input-xxlarge" name="texto" id="idTexto" rows="5"></textarea>
                            <!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Estado</legend>

                    <div class="control-group">
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox" name="ativo" id="idAtivo"> Post ativo
                            </label>
<!--<span class="help-inline">Mensagem</span>-->
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox" name="destaque" id="idDestaque"> Post destaque
                            </label>
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