<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda responsiva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
<body>

<h1>Login</h1>
    <?php if (isset($login_error)) { ?>
        <p><?php echo $login_error; ?></p>
    <?php } ?>
    <form action=""method="post">
        <label for="username">Nome de usuário:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Entrar">
    </form>



    <?php

    include"conexao.php";

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

        echo "bem vindo";

        // Redireciona para a página inicial
        header("Location: cadastro.php");
        exit();
    } else {
        // Exibe uma mensagem de erro caso o usuário e senha não correspondam a um registro
        $login_error = "Nome de usuário ou senha inválidos.";
        echo $login_error;
    }
}



    
    
    ?>
    
</body>
</html>