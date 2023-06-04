<?php
    $sql = "SELECT * FROM anuncio WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "editar") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $idade = $_POST["idade"];
        $sexo = $_POST["sexo"];
        $porte = $_POST["porte"];
        $raca = $_POST["raca"];
        $cor = $_POST["cor"];
        $enfermidade = $_POST["enfermidade"];
        $fotoanuncio = $_POST["fotoanuncio"];

        $sql = "UPDATE anuncio SET nome='{$nome}', endereco='{$endereco}', idade='{$idade}', sexo='{$sexo}', porte='{$porte}', raca='{$raca}', cor='{$cor}', enfermidade='{$enfermidade}', fotoanuncio='{$fotoanuncio}' WHERE id='{$id}'";

        if ($conn->query($sql) === TRUE) {
            echo "Anúncio atualizado com sucesso.";
            // Redirecionar para a página de anúncios
            header("Location: ?page=anuncio");
            exit;
        } else {
            echo "Erro ao atualizar o anúncio: " . $conn->error;
        }
    }
?>


<form action="?page-criaranuncio" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="<?php print $row->nome; ?>">
    </div>
    <div>
        <label>Endereço</label>
        <input type="text" name="endereco" value="<?php print $row->endereco; ?>">
    </div>
    <div>
        <label>Idade(Aproximada)</label>
        <input type="number" name="idade" value="<?php print $row->idade; ?>">
    </div>
    <div>
        <label>Sexo</label>
        <input type="text" name="sexo" value="<?php print $row->sexo; ?>">
    </div>
    <div>
        <label>Porte</label>
        <input type="text" name="porte" value="<?php print $row->porte; ?>">
    </div>
    <div>
        <label>Raça</label>
        <input type="text" name="raca" value="<?php print $row->raca; ?>">
    </div>
    <div>
        <label>Cor</label>
        <input type="text" name="cor" value="<?php print $row->cor; ?>">
    </div>
    <div>
        <label>Enfermidade</label>
        <input type="text" name="enfermidade" value="<?php print $row->enfermidade; ?>">
    </div>
    <div>
        <label>Foto do animal</label>
        <input type="text" name="fotoanuncio" value="<?php print $row->fotoanuncio; ?>">
    </div>
    <div>
        <button type="submit">Editar</button>
    </div>
</form>