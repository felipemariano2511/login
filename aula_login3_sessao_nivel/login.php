<?php
include ('config.php');
session_start(); // inicia a sessao	


if (@$_REQUEST['botao']=="Entrar")
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);
	while ($coluna=mysqli_fetch_array($result)) 
	{
		$_SESSION["id_usuario"]= $coluna["id"]; 
		$_SESSION["nome_usuario"] = $coluna["login"]; 
		$_SESSION["UsuarioNivel"] = $coluna["nivel"];

		// caso queira direcionar para páginas diferentes
		$niv = $coluna['nivel'];
		if($niv == "USR"){ 
			header("Location: menu.php"); 
			exit; 
		}
		
		if($niv == "ADM"){ 
			header("Location: menu.php"); 
			exit; 
		}
		// ----------------------------------------------
	}
	
}
?>
<html>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5"></h2>
            <div class="text-center mb-5 text-dark"></div>
            <div class="card my-5">
                <form class="card-body cardbody-color p-lg-5" method="post">
                    <div class="text-center">
                        <img src="img/pagina-do-formulario-de-login-do-usuario-3d_169241-6920.avif"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>
                    <div class="mb-3">
                        <input type="text"  name="login" class="form-control" aria-describedby="emailHelp" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <input type="text"  name="senha" class="form-control" placeholder="Password">
                    </div>
                    <div class="text-center">
						<input type="submit" name="botao" value="Entrar" class="btn btn-color px-5 mb-5 w-100">
					</div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                        Registered? <a href=" " class="text-dark fw-bold"> Create an
                            Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-color {
        background-color: #0e1c36;
        color: #fff;
    }

    .profile-image-pic {
        height: 200px;
        width: 200px;
        object-fit: cover;
    }

    .cardbody-color {
        background-color: #ebf2fa;
    }

    a {
        text-decoration: none;
    }
</style>
</body>
</html>
