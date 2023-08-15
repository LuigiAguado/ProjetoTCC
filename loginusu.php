<?php
require 'configlog.php';

if(isset($_POST["submit"])){
    $logemail = $_POST["logemail"];
    $senha = $_POST["senha"];
    $result = mysqli_query($connect, "SELECT * FROM usuario WHERE email = '$logemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($senha == $row["senha"]){
            $_session["login"] = true;
            $_session["id"] = $row["id"];
            header("Location: index.php");
        }else{
        echo
        "<script> alert('Senha errada') </script>";
        }
    }else{
        echo
        "<script> alert('Usuário não cadastrado') </script>";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>login</h2>
    <form action="" class="" mathod="post" autocomplete="off">
        <label for="logemail">Email :</label>
        <input type="email" name="logemail" id="logemail" required value=""> <br>
        <label for="senha">Senha: </label>
        <input type="password" name="senha" id = "senha" required value=""> <br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registrarusu.php">Cadastre-se</a>
</body>
</html>