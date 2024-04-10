<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
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

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .user-table th {
            background-color: #f2f2f2;
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

        /* Estilo para centralizar o ícone de lápis */
        .user-table .actions {
            text-align: center;
        }

        .user-table .actions a {
            display: inline-block;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<header class="bg-dark text-white py-4">
    <div class="container">
        <h1 class="text-center">Relatório de Usuários</h1>
    </div>
</header>

<div class="container">
    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Nível</th> 
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            include('config.php');
            $query = mysqli_query($con, "SELECT id, login, senha, nivel FROM usuario");
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['login']}</td>";
                echo "<td>*************</td>"; 
                echo "<td>{$row['nivel']}</td>"; 
                echo "<td class='actions'><a href='editar.php?id={$row['id']}'><i class='fas fa-pencil-alt'></i></a></td>"; 
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="final mt-4">
    <a href='menu.php' class="btn">Voltar ao Menu</a>
    <a href='logout.php' class="btn">Logout</a>
</div>

</body>
</html>
