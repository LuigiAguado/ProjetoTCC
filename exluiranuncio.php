<!-- exluiranuncio.php -->
<?php
    include("config.php");

    // Verificar se o parâmetro "id" está definido
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Verificar se o anúncio existe no banco de dados
        $sql = "SELECT * FROM anuncio WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Anúncio encontrado, realizar a exclusão
            $deleteSql = "DELETE FROM anuncio WHERE id = $id";
            if ($conn->query($deleteSql) === true) {
                echo "Anúncio excluído com sucesso.";
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
