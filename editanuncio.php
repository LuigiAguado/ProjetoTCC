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
            echo '<img src="img/'.$row->fotoanuncio.'" width = "300" height= "400">';
            ?></div><div id="titodesc">
            <div id="descdogtito"><?php
            echo "<h1>". $row->nome. "</h1>";
            echo "<h2>". "Org: ".$row->ong. "</h2>" . "<br>";
            ?></div><div id="descdog"><?php
            echo "<div id='colunatito'>"."Cidade: " .$row->cidade. "</div>" ."Estado: " .$row->estado . "<br>";
            echo "<div id='colunatito'>"."Bairro: " .$row->bairro. "</div>" . "Endereço: " .$row->endereco . "<br>";
            echo "<div id='colunatito'>"."Número: " .$row->numero. "</div>" . "CEP: " .$row->cep . "<br>";
            echo "<div id='colunatito'>"."Idade: " .$idadeFormatada. "</div>" . "Sexo: " .$row->sexo . "<br>";
            echo "<div id='colunatito'>"."Porte: " .$row->porte. "</div>" . "Raça: " .$row->raca . "<br>";
            echo "<div id='colunatito'>"."Cor: " .$row->cor. "</div>" . "Enfermidade: " .$row->enfermidade . "<br>";
            ?>
            </div>
            <div id="titoint">
            <?php
            echo '<button class="buttoncriara" onclick="location.href=\'editaranuncio.php?id='.$row->id.'\';">Editar</button>';
            echo '<button class="buttoncriara" onclick="if(confirm(\'Tem certeza que deseja excluir o anúncio?\')){location.href=\'exluiranuncio.php?id='.$row->id.'\';}else{false;}">Excluir</button>';
            ?>
            </div>  
            <?php
        }
    }
}

        ?>
            

        </div>
        </div>
</div>

<br><br><br>
</div>

<?php
    include("footer.php");
?>