<html>
<body>


<br>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>

<header>
    <h1>Informações de Cadastro do Usuário</h1>
</header>

<div class="container">
    <section class="user-info">
    <?php
include('config.php');
require('verifica.php');
$login = $_SESSION["nome_usuario"];

$query = mysqli_query($con, "SELECT id FROM usuario WHERE login='$login';");
$resultado = mysqli_fetch_assoc($query); 
$id = $resultado['id']; 

//$login = 'lucas';
$senha = '*********';

echo "<ul>";
echo "<li><strong>Id:</strong> $id</li>"; 
echo "<li><strong>Login:</strong> $login</li>";
echo "<li><strong>Senha:</strong> $senha</li>";
echo "</ul>";
?>

    </section>

    
</div>
<div class=final>
    <button><a href="cadastrar.php">Cadastrar</a></button>
    <a href="relatorio.php">Relatório</a>
    <a href="logout.php"> Sair </a>
</div>
<footer>
</footer>
</body>
</html>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
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
        .final{
            display: flex;
            justify-content: center;
            
            }
    </style>

