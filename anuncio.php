<?php
include("config.php");
include("header.php");
?>

<div id="cor">
        <div class="criarbotao">
            <a href="criaranuncio.php"><p>Criar novo anúncio</p>
                <img src="img/sinal2.png" alt="+" width="25" height="25">
            </a>
            <br>
    </div>
    <div id="adotetudo">
        <?php
        if (isset($_GET["nomef"]) && !empty($_GET["nomef"])) {
            $nomef = $_GET["nomef"];

            $sql = "SELECT nome, cidade, fotoanuncio, id FROM anuncio WHERE ong = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $nomef);
            $stmt->execute();
            $res = $stmt->get_result();
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
                echo "<p>Não existem anúncios para essa ONG.</p>";
            }
        } else {
            echo "<p>Nome da ONG não especificado na URL.</p>";
        }
        ?>
    </div>
</div>

<?php
include("footer.php");
?>
