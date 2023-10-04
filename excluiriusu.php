<?php
    include("config.php");

    if (isset($_GET['cpf'])) {
        $cpf = $_GET['cpf'];

        $sql = "SELECT * FROM usuario WHERE cpf = $cpf";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $deleteSql = "DELETE FROM usuario WHERE cpf = $cpf";
            if ($conn->query($deleteSql) === true) {
                echo "peril excluído com sucesso.";
                header("Location: index.php");
            } else {
                echo "Erro ao excluir o perfil: " . $conn->error;
            }
        }
    }
?>