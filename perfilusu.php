<?php
    include("config.php");
?>
<?php
    include("header.php");
?>
<div id="cor">


                <?php
        $sql = "SELECT * FROM usuario";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                ?><div class="perfilusu"> <?php

                echo '<img src="img/'.$row->fotousu.'" width = "200">';

                ?></div> <div class="perfilusu"><?php
                echo '<h1>'. $row->nome. '</h1>' . "<br>";
                ?></div> <div class="perfilusu"><?php
                echo "Email: ".$row->email . "<br>";
                echo "CPF: ".$row->cpf . " <br>";
                echo "Endereço: ".$row->endereco . "<br>";
                echo "Telefone: ".$row->telefone . "<br>";
                
                ?></div><div class="perfilusu"> <?php
                echo '<button onclick="location.href=\'editarusu.php?cpf='.$row->cpf.'\';">Editar</button>';
                echo '<button onclick="if(confirm(\'Tem certeza que deseja excluir o Perfil?\')){location.href=\'excluiriusu.php?cpf='.$row->cpf.'\';}else{false;}">Excluir</button>';
                echo '<button href="logout.php">Sair</button>';
            }
        } 
        ?>  
        </div>  
            </div>
</div>
        <?php
    include("footer.php");
?>