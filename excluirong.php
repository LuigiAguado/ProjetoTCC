<?php
include("config.php");

if (isset($_GET['CNPJ'])) {
    $CNPJ = $_GET['CNPJ'];

    $selectNomefSql = "SELECT nomef FROM ong WHERE CNPJ = '$CNPJ'";
    $resultNomef = $conn->query($selectNomefSql);

    if ($resultNomef->num_rows > 0) {
        $row = $resultNomef->fetch_assoc();
        $nomef = $row['nomef'];

        $deleteAdsSql = "DELETE FROM anuncio WHERE ong = '$nomef'";
        if ($conn->query($deleteAdsSql) === true) {

            $deleteOngSql = "DELETE FROM ong WHERE CNPJ = '$CNPJ'";
            if ($conn->query($deleteOngSql) === true) {
                session_start();
                session_destroy();

                echo "Perfil da ONG \"$nomef\" excluído com sucesso.";
                header("Location: index.php");
            } else {
                echo "Erro ao excluir o perfil: " . $conn->error;
            }
        } else {
            echo "Erro ao excluir os anúncios: " . $conn->error;
        }
    } else {
        echo "Erro ao localizar o nomef da ONG.";
    }
}
?>
