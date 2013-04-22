<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de cliente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>Cadastro de cliente</h1>

        <form name="form1" action="formulario.php" method="post">
            <fieldset>
                <legend>Dados pessoais</legend>
                Nome: <input type="text" name="nome"><br>

                Estado civil: <select name="estcivil">
                    <option value="0">Selecione ...</option>
                    <option value="1">Solteiro</option>
                    <option value="2">Casado</option>
                    <option value="3">Enrolado</option>
                </select><br>

                <input type="checkbox" value="0" name="empregado"> Atualmente empregado<br>

                Sexo:
                <input type="radio" value="M" name="sexo"> Masculino
                <input type="radio" value="F" name="sexo"> Feminino
            </fieldset>

            <fieldset>
                <legend>Dados de acesso</legend>
                Login: <input type="text" name="login"><br>
                Senha: <input type="password" name="senha">
            </fieldset>

            <fieldset>
                <legend>Dados de acesso</legend>
                <textarea name="texto"></textarea>
            </fieldset>

            <input type="submit" value="Enviar" name="enviar">

            <input type="hidden" value="Valor enviado como oculto" name="oculto">

        </form>
    </body>
</html>
