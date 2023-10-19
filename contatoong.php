<?php
    include("header.php");
    include("config.php");
    $nome = $_GET["nomef"];
    $sql = "SELECT email FROM ong WHERE nomef='" . $nome . "'";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
        ?>

<div class="h1contatoc">
</div>
<div id="contformc">

<div id="formularioc">
<div class="tituloformc">Entre em contato com a organização para adotar seu amigo</div>
<form method="POST" action="enviaremailong.php?username="<?php echo $row->email; ?>>
    <div class="detalheformc">
    <div class="infoformc">
        <label for="name">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Insira seu nome" required>
    </div>
    <div class="infoformc">
        <label for="name">Email</label>
        <input type="email" name="email" id="email" placeholder="Insira seu email" required>
    </div>
    <div class="infoformcc  ">
        <label for="name">Assunto</label>
        <input type="text" name="assunto" id="assunto" placeholder="Insira o assunto" required>
        <br><br>
        <label for="name">Mensagem</label>
        <input type="message" name="mensagem" id="mensagem" placeholder="Insira sua mensagem" style="height: 65px;" required>
    </div>
    </div>
    <div>
        <button id="buttoncriarc" type="submit">Enviar</button>
    </div>
    </form>
    </div>
    </div>
    <div class="h1contatoc">
</div>
<?php
            }
        }
    include("footer.php");
?>