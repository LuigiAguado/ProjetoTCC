<?php
    include("config.php");
?>
<?php
    include("header.php");
?>
<div id="cor">
                <?php
        $sql = "SELECT * FROM anuncio";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                ?><div id="imgperfildoga"><?php
                echo '<img src="img/'.$row->fotoanuncio.'" width = "200">';
                ?></div><div id="descdoga"><?php
                echo "<h1>". $row->nome. "</h1>" . "<br>";
                echo "<h2>".$row->endereco. "</h2>" . "<br>";
                echo "Idade: " .$row->idade . " anos <br>";
                echo "Sexo: " .$row->sexo . "<br>";
                echo "Porte: " .$row->porte . "<br>";
                echo "Raça: " .$row->raca . "<br>";
                echo "Cor: " .$row->cor . "<br>";
                echo "Enfermidade: " .$row->enfermidade . "<br><br>";
                echo '<div class="buttoncriara">';
                echo '<button onclick="location.href=\'editaranuncio.php?id='.$row->id.'\';">Editar</button>';
                echo '<button onclick="if(confirm(\'Tem certeza que deseja excluir o anúncio?\')){location.href=\'exluiranuncio.php?id='.$row->id.'\';}else{false;}">Excluir</button>';
                echo '</div>'."<br>";
            }
        }else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
            </div>
        <br><br>

        <div>
        <div>
            <p style="font-size: 2rem; color: #fff;">
                    Criar novo anúncio
                </p>
                <a href="criaranuncio.php">
                    <img src="img/sinal2.png" alt="+" width="25" height="25">
                </a>
                <br>
            </div>
            </div>
        <br><br><br><br>
</div>
    <?php
    include("footer.php");
?>