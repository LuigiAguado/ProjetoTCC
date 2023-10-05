<?php
include("config.php");
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
                        <a onclick="location.href='perfildog.php?id=<?php echo $row->id; ?>';">
                            <img src="img/<?php echo $row->fotoanuncio; ?>" width="130">
                            <h2><?php echo $row->nome; ?></h2>
                            <h3><?php echo $row->endereco; ?></h3>
                        </a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
    </div>
</div>

<?php
include("footer.php");
?>