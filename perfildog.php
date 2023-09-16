<?php
    include("header.php");
?>


<?php
include ("config.php");

    $sql = "SELECT * FROM anuncio";
    $res = $conn->query($sql);

?>
<div>
<div>
<?php

if (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) {
    $id = $_REQUEST["id"];

    $sql = "SELECT * FROM anuncio WHERE id=" . $id;
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                
                echo '<img src="img/'.$row->fotoanuncio.'" width = "200">'."<br>";
                echo "Nome: " . $row->nome . "<br>";
                echo "Endereço: " .$row->endereco . "<br>";
                echo "Idade: " .$row->idade . " anos <br>";
                echo "Sexo: " .$row->sexo . "<br>";
                echo "Porte: " .$row->porte . "<br>";
                echo "Raça: " .$row->raca . "<br>";
                echo "Cor: " .$row->cor . "<br>";
                echo "Enfermidade: " .$row->enfermidade . "<br><br>";

            }
        }
    }
        ?>
</div>
Estou interesado:
<button> Adotar</button>
</div>

<?php
    include("footer.php");
?>