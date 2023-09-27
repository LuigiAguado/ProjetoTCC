<?php
    include("config.php");
?>
<?php
    include("header.php");
?>
    <div class="fundo">
    <br><br><br><br>
    
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <?php
        $sql = "SELECT * FROM anuncio";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                ?><div id="imgperfildog"><?php
                echo '<img src="img/'.$row->fotoanuncio.'" width = "200">';
                ?></div><div id="descdog"><?php
                echo "<h1>". $row->nome. "</h1>" . "<br>";
                echo "<h2>".$row->endereco. "</h2>" . "<br>";
                echo "Idade: " .$row->idade . " anos <br>";
                echo "Sexo: " .$row->sexo . "<br>";
                echo "Porte: " .$row->porte . "<br>";
                echo "Raça: " .$row->raca . "<br>";
                echo "Cor: " .$row->cor . "<br>";
                echo "Enfermidade: " .$row->enfermidade . "<br><br>";
                echo '<div class="buttoncriar">';
                echo '<button class="meu-botao" onclick="location.href=\'editaranuncio.php?id='.$row->id.'\';">Editar</button>';
                echo '<button class="meu-botao excluir" onclick="if(confirm(\'Tem certeza que deseja excluir o anúncio?\')){location.href=\'exluiranuncio.php?id='.$row->id.'\';}else{false;}">Excluir</button>';
                echo '</div>'."<br>";
            }
        }else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
            </div>
        </div>

        <br><br>

        <div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <p class="criar-anun" style="font-size: 2rem; color: #fff;">
                    Criar novo anúncio
                </p>
                <a href="criaranuncio.php" class="btn btn-primary">
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