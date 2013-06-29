<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de coiso</title>
		{include file='inc/html-head.tpl'}
    </head>
    <body>
		{include file='inc/html-menu.tpl'}

        <section class="container">
            <section class="row">
                <div class="span6 offset3">
                    <header class="page-header">
                        <h1>Cadastro de coiso</h1>
                    </header>
					
					{include file='inc/html-msg.tpl'}

                    <form action="" class="" method="post">
                        <fieldset>
                            <legend>Dados do coiso</legend>

                            <div class="control-group">
                                <label class="control-label" for="idNome">Coiso</label>
                                <div class="controls">
                                    <input type="text" name="nome" id="idNome" class="input-xxlarge" value="{$valores['nome']}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="idDescricao">Descrição</label>
                                <div class="controls">
                                    <textarea type="text" name="descricao" id="idDescricao" class="input-xxlarge">{$valores['descricao']}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="checkbox" name="ativo"{if $valores['status'] eq 'A'} checked{/if}> Coiso ativo
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn">Cancelar</button>
                        </div>
                    </form>
                </div>
            </section>
        </section>

		{include file='inc/html-javascript.tpl'}
    </body>
</html>