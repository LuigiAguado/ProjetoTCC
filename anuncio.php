<?php
include("config.php");
include("header.php");
?>

<div id="cor">
<div>
        <div class="criarbotao">
            <p style="font-size: 2rem; color: #fff;">
                    Criar novo anúncio
                </p>
                <a href="criaranuncio.php">
                    <img src="img/sinal2.png" alt="+" width="25" height="25">
                </a>
                <br>
            </div>
            </div>
    <div id="adotetudo">
        <?php
        $sql = "SELECT fotoanuncio, nome, cidade, id FROM anuncio;";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
        ?>
                <div id="adoteall">
                    <div class="cardadote">
                        <a onclick="location.href='editanuncio.php?id=<?php echo $row->id; ?>';">
                            <img src="img/<?php echo $row->fotoanuncio; ?>" width="130" height="170">
                            <h2><?php echo $row->nome; ?></h2>
                            <h3><?php echo $row->cidade; ?></h3>
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