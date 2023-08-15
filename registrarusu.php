<?php
require 'configlog.php';

if(isset($_POST["submit"])){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $confirmsenha = $_POST["confirmsenha"];
    $duplicate = mysqli_query($connect, "SELECT * FROM usuario WHERE cpf = '$cpf' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('CPF ou email já está sendo utilizado') </script>";
    }
    else{
        if($senha == $confirmsenha){
            $query = "INSERT INTO usuario VALUES('$cpf','$nome','$email','$telefone','$senha','$endereco')";
            mysqli_query($connect,$query);
            echo
            "<script> alert('Cadastro realizado com sucesso') </script>";
        }else{
            echo
            "<script> alert('A senha está diferente') </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
</head>
<body>
    <h2>Cadastrar usuário</h2>
    <form action="" class="" method="post" autocomplete="off">
        <label for="nome">Nome :</label>
        <input type="text" name="nome" id ="nome" value=""> <br>

        <label for="email">Email :</label>
        <input type="email" name="email" id ="email" value=""> <br>

        <label for="cpf">CPF :</label>
        <input type="number" name="cpf" id ="cpf" value=""> <br>

        <label for="telefone">Telefone :</label>
        <input type="number" name="telefone" id ="telefone" value=""> <br>

        <label for="endereco">Endereço :</label>
        <input type="text" name="endereco" id ="endereco" value=""> <br>

        <label for="senha">Senha :</label>
        <input type="password" name="senha" id ="senha" value=""> <br>

        <label for="confirmsenha">Confirmar senha :</label>
        <input type="password" name="confirmsenha" id ="confirmsenha" value=""> <br>

        <button type="submit" name="submit">Cadastrar</button>
        <br>
        <a href="loginusu.php">login</a>
    </form>
</body>
</html>