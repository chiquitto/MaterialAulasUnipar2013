<!DOCTYPE html>
<html>
    <head>
        <title>Lista de coisos</title>
        {include file='inc/html-head.tpl'}
    </head>
    <body>
        {include file='inc/html-menu.tpl'}

        <section class="container">
            <section class="row">
                <header class="page-header">
                    <h1>Lista de coiso</h1>
                </header>
                
                {include file='inc/html-msg.tpl'}

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do coiso</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
						{section name=i loop=$coisos}
                            <tr>
                                <td>{$coisos[i]->idcoiso}</td>
                                <td>{$coisos[i]->nome}</td>
                                <td>
									{if $coisos[i]->status eq 'A'}<span class="label label-success">Ativo</span>{/if}
                                    {if $coisos[i]->status neq 'A'}<span class="label label-important">Inativo</span>{/if}
                                </td>
                                <td>
                                    <a class="btn btn-success btn-mini" href="./cadastrar-coiso.php?idcoiso={$coisos[i]->idcoiso}">Editar</a>
                                    <a class="btn btn-danger btn-mini" href="./coisos.php?act=del&idcoiso={$coisos[i]->idcoiso}">Deletar</a>
                                </td>
                            </tr>
                        {/section}
                    </tbody>
                </table>

                <div class="btn-group">
                    <a class="btn btn-success" href="./cadastrar-coiso.php">Novo</a>
                </div>
            </section>
        </section>

        {include file='inc/html-javascript.tpl'}
    </body>
</html>