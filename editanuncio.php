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

            $dataNascimento = new DateTime($row->idade);
            $hoje = new DateTime();
            $intervalo = $dataNascimento->diff($hoje);
            
            $anos = $intervalo->y;
            $meses = $intervalo->m;
            $dias = $intervalo->d;

            if ($anos > 0) {
                $idadeFormatada = $anos . " ano(s)";
            } elseif ($meses > 0) {
                $idadeFormatada = $meses . " mês(es)";
            } else {
                $idadeFormatada = $dias . " dia(s)";
            }

            ?><div id="imgperfildog"><?php
            echo '<img src="img/'.$row->fotoanuncio.'" width = "300">';
            ?></div><div id="descjuntoo"><div id="descdog"><?php
            echo "<h1>". $row->nome. "</h1>";
            echo "<h2>".$row->cidade. "</h2>" . "<br>";
            ?></div><div id="descdog"><?php
            echo "Estado: " .$row->estado . "Bairro: " .$row->bairro . "<br>";
            echo "Bairro: " .$row->bairro . "<br>";
            echo "Endereço: " .$row->endereco . "<br>";
            echo "Número: " .$row->numero . "<br>";
            echo "CEP: " .$row->cep . "<br>";
            echo "Idade: " .$idadeFormatada . "<br>";
            echo "Sexo: " .$row->sexo . "<br>";
            echo "Porte: " .$row->porte . "<br>";
            echo "Raça: " .$row->raca . "<br>";
            echo "Cor: " .$row->cor . "<br>";
            echo "Enfermidade: " .$row->enfermidade . "<br>";
            echo '<div class="buttoncriara">';
            echo '<button onclick="location.href=\'editaranuncio.php?id='.$row->id.'\';">Editar</button>';
            echo '<button onclick="if(confirm(\'Tem certeza que deseja excluir o anúncio?\')){location.href=\'exluiranuncio.php?id='.$row->id.'\';}else{false;}">Excluir</button>';
            echo '</div>'."<br>";
        }
    }
}

        ?>
        </div>
        </div>
</div>
</div>
<br><br>

<?php
    include("footer.php");
?>