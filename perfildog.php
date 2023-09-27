<?php
    include("header.php");
?>


<?php
include ("config.php");

    $sql = "SELECT * FROM anuncio";
    $res = $conn->query($sql);

?>
<div id="cor">
    <br><br><br><br>
    <div id="boxdog">
<div id="perfildog">

<?php

if (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) {
    $id = $_REQUEST["id"];

    $sql = "SELECT * FROM anuncio WHERE id=" . $id;
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                ?><div id="imgperfildog"><?php
                echo '<img src="img/'.$row->fotoanuncio.'" width = "300">';
                ?></div><div id="descdog"><?php
                echo "<h1>". $row->nome. "</h1>" . "<br>";
                echo "<h2>".$row->endereco. "</h2>" . "<br>";
                echo "Idade: " .$row->idade . " anos <br>";
                echo "Sexo: " .$row->sexo . "<br>";
                echo "Porte: " .$row->porte . "<br>";
                echo "Raça: " .$row->raca . "<br>";
                echo "Cor: " .$row->cor . "<br>";
                echo "Enfermidade: " .$row->enfermidade . "<br><br>";
                ?>
                Ficou interesado?
                <button id="buttoncriar"> Adotar</button>
                <?php
            }
        }
    }
        ?>
        </div>
</div>
</div>
<br><br>

<?php
    include("footer.php");
?>