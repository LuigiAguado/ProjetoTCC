<?php
    include("config.php");

    if (isset($_GET['CPNJ'])) {
        $cpf = $_GET['CNPJ'];

        // Verificar se o anúncio existe no banco de dados
        $sql = "SELECT * FROM ong WHERE CNPJ = $CNPJ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Anúncio encontrado, realizar a exclusão
            $deleteSql = "DELETE FROM usuario WHERE CNPJ = $CNPJ";
            if ($conn->query($deleteSql) === true) {
                echo "peril excluído com sucesso.";
                header("Location: index.html");
            } else {
                echo "Erro ao excluir o perfil: " . $conn->error;
            }
        }
    }
?>
