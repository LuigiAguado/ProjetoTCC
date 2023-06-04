<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "cadastrar") {
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $porte = $_POST["porte"];
    $raca = $_POST["raca"];
    $cor = $_POST["cor"];
    $enfermidade = $_POST["enfermidade"];
    $fotoanuncio = $_POST["fotoanuncio"];

    $sql = "INSERT INTO anuncio (nome, endereco, idade, sexo, porte, raca, cor, enfermidade, fotoanuncio) VALUES ('{$nome}', '{$endereco}', '{$idade}', '{$sexo}', '{$porte}', '{$raca}', '{$cor}', '{$enfermidade}', '{$fotoanuncio}')";

    if ($conn->query($sql) === true) {
        echo "Anúncio criado com sucesso.";
        // Redirecionar para a página de anúncios
        header("Location: ?page=anuncio");
        exit;
    } else {
        echo "Erro ao criar o anúncio: " . $conn->error;
    }
}


?>

<form action="?page=criaranuncio" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div>
        <label>Nome</label>
        <input type="text" name="nome">
    </div>
    <div>
        <label>Endereço</label>
        <input type="text" name="endereco">
    </div>
    <div>
        <label>Idade (Aproximada)</label>
        <input type="number" name="idade" value="0">
    </div>
    <div>
        <label>Sexo</label>
        <input type="text" name="sexo">
    </div>
    <div>
        <label>Porte</label>
        <input type="text" name="porte">
    </div>
    <div>
        <label>Raça</label>
        <input type="text" name="raca">
    </div>
    <div>
        <label>Cor</label>
        <input type="text" name="cor">
    </div>
    <div>
        <label>Enfermidade</label>
        <input type="text" name="enfermidade">
    </div>
    <div>
        <label>Foto do animal</label>
        <input type="text" name="fotoanuncio">
    </div>
    <div>
        <button type="submit">Criar</button>
    </div>
</form>

<div>
    <?php
    $sql = "SELECT * FROM anuncio";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        while ($row = $res->fetch_object()) {
            print $row->nome;
            print $row->endereco;
            print $row->idade;
            print $row->sexo;
            print $row->porte;
            print $row->raca;
            print $row->cor;
            print $row->enfermidade;
            print $row->fotoanuncio;
            print "<button onclick=\"location.href='?page=editaranuncio&id=".$row->id."';\">Editar</button>";
            echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir o anúncio?')){location.href='exluiranuncio.php?id=".$row->id."';}else{false;}\">Excluir</button>";
        }
    } else {
        print "<p>Não existe anúncios</p>";
    }
    ?>
</div>
