<?php

require 'configlog.php';
if(!empty($_SESSION["cpf"])){
    $cpf = $_SESSION["cpf"];
    $result = mysqli_query($connect, "SELECT * FROM usuario WHERE cpf = $cpf");
    $row = mysqli_fetch_assoc($result);
}
else{
    header(Location: loginusu.php);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>bem vindo <?php echo $row["nome"]; ?></h1>
    <a href="logoutusu.php">sair</a>
</body>
</html>