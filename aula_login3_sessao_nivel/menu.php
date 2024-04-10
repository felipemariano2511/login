
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .user-info {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .user-info ul {
            list-style-type: none;
            padding: 0;
        }

        .user-info li {
            margin-bottom: 10px;
        }

        .user-info strong {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .final {
            display: flex;
            justify-content: center;
        }

        .final .btn {
            margin: 0 10px;
            border-radius: 10px;
            background-color: white;
        }

        .final .btn a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<?php
include('config.php');
require('verifica.php');
?>

<header class="bg-dark text-white py-4">
    <div class="container">
        <h1 class="text-center">
            <?php
            $login = $_SESSION["nome_usuario"];
            $nome = ucfirst($login);
            echo "Bem-vindo, $nome!";
            ?>
        </h1>
    </div>
</header>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <section class="user-info">
                        <?php
                        $query = mysqli_query($con, "SELECT id FROM usuario WHERE login='$login';");
                        $resultado = mysqli_fetch_assoc($query);
                        $id = $resultado['id'];
                        $senha = '***************************';

                        echo "<ul>";
                        echo "<li><strong>Id:</strong> $id</li>";
                        echo "<li><strong>Login:</strong> $login</li>";
                        echo "<li><strong>Senha:</strong> $senha</li>";
                        echo "</ul>";
                        ?>
                    </section>

                    <div class="final mt-4">
                        <button class="btn btn-light mr-3"><a href='editar.php' class="text-dark">Editar Cadastro</a></button>
                        <button class="btn btn-light mr-3"><a href='relatorio.php' class="text-dark">Relatório</a></button>
                        <button class="btn btn-light"><a href='logout.php' class="text-dark">Logout</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <p class="text-center"></p>
    </div>
</footer>

</body>
</html>
