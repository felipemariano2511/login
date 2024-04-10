<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
include('config.php');
session_start();

if (isset($_POST['botao']) && $_POST['botao'] == "Entrar") {
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    $query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $coluna = mysqli_fetch_array($result);
        $_SESSION["id_usuario"] = $coluna["id"];
        $_SESSION["nome_usuario"] = $coluna["login"];
        $_SESSION["nivel"] = $coluna["nivel"];

        $niv = $coluna['nivel'];
        if ($_SESSION["nivel"] == "USR" || $_SESSION["nivel"] == "ADM") {
            header("Location: menu.php");
            exit;
        }
    } else {
        $mensagem_erro = "Credenciais inválidas";
    }
}
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Login</h2>
                    <?php if (isset($mensagem_erro)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensagem_erro; ?>
                        </div>
                    <?php } ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="login">Usuário</label>
                            <input type="text" class="form-control" id="login" name="login" placeholder="Digite seu usuário">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                        </div>
                        <button type="submit" name="botao" value="Entrar" class="btn btn-primary btn-block">Entrar</button>
                    </form>
                    <div class="text-center mt-3">
                        Não possui uma conta? <a href="cadastrar.php">Registre-se aqui!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
