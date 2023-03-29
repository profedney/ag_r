<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda responsiva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
<body>


  <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
    <h1>Cadastro Agenda</h1>
  </div>
    
    <!-- Form bootstrap    -->
    

    <form action="" method="post">
      <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp">    
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <label for="sobrenome" class="form-label">Sobrenome</label>
          <input type="text"name="sobrenome" class="form-control" id="sobrenome">
        </div>
      </div>

      
      <div class="form-group">
        <div class="col-md-6 offset-md-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text"name="telefone" class="form-control" id="telefone">
        </div>
      </div>
      <br>

      <div class="form-group">
        <div class="col-md-6 offset-md-5">
          <button type="submit" class="btn btn-primary">Gravar</button>
        </div>
      </div>

      
    </form>
    

    <!-- Formulário HTML -->
<!--
    
<form action="" method="post">
  <label>Nome: </label><br>
  <input type="text" name="nome"><br>
  <label>Sobrenome: </label><br>
  <input type="text" name="sobrenome"><br>
  <label>Telefone: </label><br>
  <input type="text" name="telefone"><br>
  <input type="submit" value="Gravar">
</form>
-->

<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">

  <?php

    


//variaveis da conexão do banco dados

include "conexao.php";



// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Coleta os dados do formulário
  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $telefone = $_POST["telefone"];

  // Insere os dados no banco de dados
  $sql = "INSERT INTO agenda (nome, sobrenome, telefone) VALUES ('$nome', '$sobrenome', '$telefone')";
  if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso"."<br>";
  } else {
    echo "Erro ao inserir dados: " . $conn->error;
  }
}
$conn->close();
?>
  
</div><br>




<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
  <h2><a href="index.php">Exibir Agenda</a></h2>
</div>

    
    
</body>
</html>
