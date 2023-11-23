<?php
    include("config.php");
?>
<?php
    include("header.php");
?>
<div id="cor">
    <br><br><br><br><br><br><br><br><br><br>
    <div id="comperfil">
    <div id="caixaperfil">


                <?php
    if (isset($_REQUEST["cpf"]) && !empty($_REQUEST["cpf"])) {
        $cpf = $_REQUEST["cpf"];

        $sql = "SELECT * FROM usuario WHERE cpf=" . $cpf;
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                ?><div class="perfilusu"> <?php

                echo '<img src="img/'.$row->fotousu.'" width = "200" height="200">';

                ?></div> <div class="perfilusu"><?php
                echo '<h1>'. $row->nome. '</h1>' . "<br><br>";
                ?></div> <div class="perfilusu"><?php
                echo "Email: ".$row->email . "<br><br>";
                echo "CPF: ".$row->cpf . " <br><br>";
                echo "Estado: ".$row->estado . "<br><br>";
                echo "Cidade: ".$row->cidade . "<br><br>";
                echo "Bairro: ".$row->bairro . "<br><br>";
                echo "Endereço: ".$row->endereco . "," . $row->numero ."<br><br>";
                echo "CEP: ".$row->cep . "<br><br>";
                echo "Telefone: ".$row->telefone . "<br><br>";
                
                ?></div><div class="perfilusu"> <?php
                echo '<button onclick="location.href=\'editarusu.php?cpf='.$row->cpf.'\';">Editar</button>';
                echo '<button onclick="if(confirm(\'Tem certeza que deseja excluir o Perfil?\')){location.href=\'excluiriusu.php?cpf='.$row->cpf.'\';}else{false;}">Excluir</button>';
                echo '<button onclick="location.href=\'logout.php\';">Sair</button>';
            }
        } 
    }
        ?>  
        </div>  
        </div>
            </div>
</div>
<div id="cor">
<br><br><br><br><br><br><br><br><br><br>    
</div>
</div>

        <?php
    include("footer.php");
?>