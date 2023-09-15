<?php
    include("header.php");
?>
    <div style="background: linear-gradient(135deg, #0187a7, #016d88);">
    <br><br><br><br><br>
    <div id="contform">
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
        header("Location: anuncio.php");
        exit;
    } else {
        echo "Erro ao criar o anúncio: " . $conn->error;
    }
}
?>
<div id="formulario">
    <div class="tituloform">Registrar Anúncio</div>
<form action="?page=criaranuncio" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Nome</label>
        <input type="text" name="nome" placeholder="Insira o nome do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Endereço</label>
        <input type="text" name="endereco" placeholder="Insira a localização do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Idade (Aproximada)</label>
        <input type="number" id="idadeseta" name="idade" value="0" min="0">
    </div>
    <div class="infoform">
        <label class="letraform">Sexo</label>
        <input type="text" name="sexo" placeholder="Insira o porte do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Porte</label>
        <input type="text" name="porte" placeholder="Insira o porte do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Raça</label>
        <input type="text" name="raca" placeholder="Insira a raça do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Cor</label>
        <input type="text" name="cor" placeholder="Insira a cor do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Enfermidade</label>
        <input type="text" name="enfermidade" placeholder="Insira a enfermidade do animal">
    </div>
    </div>
    <div id="fotoanimalform">
    <div>
        <div>
       <img src="choose.png" id="img" height="200" width="200"> 
        </div>
        <label>Foto do animal: </label>
        <input type="file" name="fotousu" id="fotousu" accept="image/*">
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Editar</button>
    </div>
    <script>
let img = document.getElementById('img');
let input = document.getElementById('fotousu')

input.onchange = (e) => {
    if (input.files[0])
        img.src = URL.createObjectURL(input.files[0]);
};
</script>
</form>
</div>
</div>
<br><br><br><br><br>
</div>
<?php
    include("footer.php");
?>