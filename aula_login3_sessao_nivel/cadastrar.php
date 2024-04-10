<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .cadastro {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cadastro label {
            display: block;
            margin-bottom: 10px;
        }

        .cadastro input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .cadastro button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        .cadastro button:hover {
            background-color: #555;
        }
        
    </style>
</head>
<body>

<div class="container">
    <form class="cadastro" method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>
</div>
<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login']) && isset($_POST['senha'])) {

        $login = $_POST['login'];
        $senha = md5($_POST['senha']); // Criptografando a senha usando MD5

        $query = mysqli_query($con, "INSERT INTO usuario (id, login, senha, nivel) VALUES (null, '$login', '$senha', 'USR');");

        if ($query) {
            echo "<script>alert('Conta registrada com sucesso!');top.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Erro ao registrar a conta. Por favor, tente novamente.');</script>";
        }

    }
}
?>

</body>
</html>
