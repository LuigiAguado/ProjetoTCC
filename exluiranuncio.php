<?php
    include("config.php");


    if (isset($_GET['id'])) {
        $id = $_GET['id'];


        $sql = "SELECT * FROM anuncio WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $deleteSql = "DELETE FROM anuncio WHERE id = $id";
            if ($conn->query($deleteSql) === true) {
                echo "Anúncio excluído com sucesso.";
                header("Location: index.php");
            } else {
                echo "Erro ao excluir o anúncio: " . $conn->error;
            }
        } else {
            echo "Anúncio não encontrado.";
        }
    } else {
        echo "ID do anúncio não fornecido.";
    }
?>
