<?php
    include("config.php");
    include("header.php");
?>
<div id="cor">
    <br><br><br><br><br><br><br><br><br><br>
    <div id="comperfil">
    <div id="caixaperfilong">


                <?php
    if (isset($_REQUEST["CNPJ"]) && !empty($_REQUEST["CNPJ"])) {
        $CNPJ = $_REQUEST["CNPJ"];

        $sql = "SELECT * FROM ong WHERE CNPJ=" . $CNPJ;
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                ?><div class="perfilusu"> <?php

                echo '<img src="img/'.$row->fotoong.'" width = "200" height="200">';

                ?></div> <div class="perfilusu"><?php
                echo '<h1>'. $row->nomef. '</h1>' . "<br><br>";
                ?></div> <div class="perfilusu"><?php
                echo "Razão Social: ".$row->razao . "<br><br>";
                echo "Email: ".$row->email . "<br><br>";
                echo "CNPJ: ".$row->CNPJ . " <br><br>";
                echo "Estado: ".$row->estado . "<br><br>";
                echo "Cidade: ".$row->cidade . "<br><br>";
                echo "Bairro: ".$row->bairro . "<br><br>";
                echo "Endereço: ".$row->endereco . "," . $row->numero ."<br><br>";
                echo "CEP: ".$row->cep . "<br><br>";
                echo "Telefone: ".$row->telefone . "<br><br>";
                
                ?></div><div class="perfilusu"> <?php
                echo '<button onclick="location.href=\'editarong.php?CNPJ='.$row->CNPJ.'\';">Editar</button>';
                echo '<button onclick="if(confirm(\'Tem certeza que deseja excluir o Perfil?\')){location.href=\'excluiriusu.php?CNPJ='.$row->CNPJ.'\';}else{false;}">Excluir</button>';
                echo '<button onclick="location.href=\'logout.php\';">Sair</button>';
            }
        } 
    }
        ?>  
        </div>  
            </div>
</div>
<div id="cor">
<br><br><br><br><br><br><br><br><br><br>    
</div>
</div>
</div>

        <?php
    include("footer.php");
?>