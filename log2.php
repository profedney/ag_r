<?php

include "conexao.php";

// Inicializa a sessão
session_start();

// Verifica se o formulário de login foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o nome de usuário e senha do formulário
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Consulta o banco de dados para verificar se o usuário e senha correspondem a um registro
    $sql = "SELECT id FROM usuarios WHERE nome = '$username' AND senha = '$password'";
    $result = mysqli_query($conn, $sql);

    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($result) == 1) {
        // Inicia a sessão com o ID do usuário
        $row = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $row["id"];

        // Redireciona para a página de cadastro
        header("Location: cadastro.php");
        exit();
    } else {
        // Exibe uma mensagem de erro caso o usuário e senha não correspondam a um registro
        $login_error = "Nome de usuário ou senha inválidos.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1 class="text-center">Login</h1>
            <?php if (isset($login_error)) { ?>
                <div class="alert alert-danger"><?php echo $login_error; ?></div>
            <?php } ?>
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Nome de usuário:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
