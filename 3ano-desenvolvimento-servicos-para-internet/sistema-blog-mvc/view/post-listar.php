<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de post</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="./static/twitter-bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="./static/estilo.css" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <h1>Listagem de posts</h1>
            
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Resumo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach($dados['posts'] as $post) { ?>
                <tr>
                  <td><?php echo $post['id']; ?></td>
                  <td><?php echo $post['nome']; ?></td>
                  <td><?php echo $post['resumo']; ?></td>
                  <td></td>
                </tr>
                  <?php } ?>
              </tbody>
            </table>
        </div>
    </body>
</html>