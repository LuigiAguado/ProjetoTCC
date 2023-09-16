<?php
    include("config.php");
?>
<?php
    include("headerbo.php");
?>

    <div class="fundo">
    <br><br><br><br>
    
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <?php
        $sql = "SELECT * FROM usuario";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                echo "Nome: ". $row->nome . "<br>";
                echo "Email: ".$row->email . "<br>";
                echo "CPF: ".$row->cpf . " anos <br>";
                echo "Endereço: ".$row->endereco . "<br>";
                echo "Telefone: ".$row->telefone . "<br>";
                echo '<img src="img/'.$row->fotousu.'" width = "200">'."<br>";

                echo '<div class="botoes-container">';
                echo '<button class="meu-botao" onclick="location.href=\'editarusu.php?cpf='.$row->cpf.'\';">Editar</button>';
                echo '<button class="meu-botao excluir" onclick="if(confirm(\'Tem certeza que deseja excluir o anúncio?\')){location.href=\'excluiriusu.php?cpf='.$row->cpf.'\';}else{false;}">Excluir</button>';
                echo '</div>'. "<br>";
                
            }
        } 
        ?>
            </div>
        </div>

        <br><br>
        <?php
    include("footer.php");
?>