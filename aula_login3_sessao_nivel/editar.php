<?php
include('config.php');
require('verifica.php');

$id_usuario = $_SESSION['id_usuario'];
$id_usuario_url = $_GET['id'];

if ($id_usuario != $id_usuario_url && $_SESSION['nivel'] != "ADM"){
    header("Location: menu.php");
        exit();
}


$query = mysqli_query($con, "SELECT * FROM usuario WHERE id='$id_usuario_url'");
$usuario = mysqli_fetch_assoc($query);

if(empty($usuario)) {

    header("Location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $nivel = isset($_POST['nivel']) ? 'ADM' : 'USR';

    $update_query = mysqli_query($con, "UPDATE usuario SET login='$login', senha='$senha', nivel='$nivel' WHERE id='$id_usuario_url'");

    if($update_query) {
        header("Location: menu.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Adicionando FontAwesome -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin-top: 0;
        }

        .container {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .final {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .final .btn {
            margin: 0 10px;
            border-radius: 10px;
            background-color: white;
            color: black;
            text-decoration: none;
            padding: 10px 20px;
        }

        input.transparent-input {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .password-input-container {
            position: relative;
            width: fit-content;
        }

        .password-input {
            color:black
        }
        .login-input {
            width: 100%;
            border: none;
            background-color: transparent;
            font-size: 16px;
            
        }

        .password-mask,
        .login-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            border: none;
            background-color: transparent;
            font-size: 16px;
            color: black;
            caret-color: black;
        }

    </style>
</head>
<body>

<header class="bg-dark text-white py-4">
    <div class="container">
        <h1 class="text-center">Editar Usuário</h1>
    </div>
</header>

<div class="container">
    <form method="POST">
        <div class="form-group">
            <label for="login">Login:</label>
            <div class="login-input-container">
                <input type="text" class="login-input transparent-input" id="login" name="login" value="<?php echo $usuario['login']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <div class="password-input-container">
                <input type="password" class="password-input" id="senha_display" value="<?php echo str_repeat("", isset($usuario['senha']) ? strlen($usuario['senha']) : 0); ?>" readonly>
                <input type="password" class="password-mask" id="senha" name="senha" placeholder="Nova senha" required>
            </div>
        </div>
        <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === 'ADM'): ?>
            <div class="form-group">
                <label for="nivel">Nível:</label>
                <label class="switch">
                    <input type="checkbox" id="nivel" name="nivel" <?php echo $usuario['nivel'] === 'ADM' ? 'checked' : ''; ?>>
                    <span class="slider"></span>
                </label>
                <span class="switch-label">Administrador</span>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

<div class="final mt-4">
    <a href='menu.php' class="btn">Voltar ao Menu</a>
    <a href='logout.php' class="btn">Logout</a>
</div>

</body>
</html>



