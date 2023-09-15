<?php
    include("config.php");
?>
<?php
    include("header.php");
?>

            <?php

        $sql = "SELECT fotoanuncio, nome, endereco FROM anuncio;";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                '<div  class="conteudoadote">';
                '<div class="galeria">';
                '<article class="cartao">';
                '<figure>';
                echo '<img src="img/'.$row->fotoanuncio.'" width = "200">'. '<br>';
                echo $row->nome . "<br>";
                echo $row->endereco . "<br>";
               ' <figcaption>';
               '</figcaption>';
               '</figure>';
               '</article>';
               '</div>';
               '</div>';
            }
        }else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>

<?php
    include("footer.php");
?>