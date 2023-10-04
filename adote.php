<?php
    include("config.php");
?>
<?php
    include("header.php");
?>
<div id="cor">

    <div id="adotetudo">
            <?php

        $sql = "SELECT fotoanuncio, nome, endereco, id FROM anuncio;";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                ?> 
                <div id="adoteall">
    <div class="cardadote">
                <?php
                echo '<a onclick="location.href=\'perfildog.php?id='.$row->id.'\';">. <img src="img/'.$row->fotoanuncio.'" width = "130" >';
                echo '<h2>' .$row->nome . '</h2>';
                echo '<h3>' .$row->endereco . '</h3>';
                echo '</a>';
            }
            ?> 
            </div>
</div>
            <?php
        }else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
        </div>
        </div>
<?php
    include("footer.php");
?>