<?php
include("config.php");
include("header.php");

if (isset($_REQUEST["cpf"]) && !empty($_REQUEST["cpf"])) {
    $cpf = $_REQUEST["cpf"];
    
    $sql = "SELECT * FROM usuario WHERE cpf=" . $cpf;
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        while ($row = $res->fetch_object()) {
            echo '<div id="cor"><br><br><br><br><br>';
            echo '<div id="comperfil">';
            echo '<div id="caixaperfil">';
            echo '<div class="perfilusu">';
            
            echo '<img src="img/' . $row->fotousu . '" width="200">';
            
            echo '</div>';
            
            echo '<div class="perfilusu">';
            echo '<h1>' . $row->nome . '</h1><br><br>';
            echo 'Email: ' . $row->email . '<br><br>';
            echo 'CPF: ' . $row->cpf . ' <br><br>';
            echo 'Estado: ' . $row->estado . '<br><br>';
            echo 'Cidade: ' . $row->cidade . '<br><br>';
            echo 'Bairro: ' . $row->bairro . '<br><br>';
            echo 'Endereço: ' . $row->endereco . ',' . $row->numero . '<br><br>';
            echo 'CEP: ' . $row->cep . '<br><br>';
            echo 'Telefone: ' . $row->telefone . '<br><br>';
            
            echo '<button onclick="location.href=\'editarusu.php?cpf=' . $row->cpf . '\';">Editar</button>';
            echo '<button onclick="if(confirm(\'Tem certeza que deseja excluir o Perfil?\')){location.href=\'excluiriusu.php?cpf=' . $row->cpf . '\';}else{false;}">Excluir</button>';
            echo '<button onclick="location.href=\'logout.php\';">Sair</button>';
            
            echo '</div></div></div></div>';
        }
    } else {
        echo "Perfil não encontrado.";
    }
}
    
include("footer.php");
?>
