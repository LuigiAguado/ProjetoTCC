<?php
    $sql = "SELECT * FROM anuncio WHERE id=".$_REQUEST["id"];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
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