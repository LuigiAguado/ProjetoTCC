<?php
    include("config.php");

    if (isset($_GET['CNPJ'])) {
        $CNPJ = $_GET['CNPJ'];

        $sql = "SELECT * FROM ong WHERE CNPJ = $CNPJ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $deleteSql = "DELETE FROM ong WHERE CNPJ = " . $CNPJ;
            if ($conn->query($deleteSql) === true) {
                session_start();
                session_destroy();

                echo "Perfil excluído com sucesso.";
                header("Location: index.php");
            } else {
                echo "Erro ao excluir o perfil: " . $conn->error;
            }
        }
    }
?>
