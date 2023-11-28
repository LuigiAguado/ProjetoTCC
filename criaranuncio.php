<?php
    include("header.php");
?>
    <div id="cor">
    <br><br><br><br><br><br><br><br><br>
    <div id="espaco">
    <div id="contform">
<?php
include("config.php");
$nomef = $_GET["nomef"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "cadastrar") {
    
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $porte = $_POST["porte"];
    $raca = $_POST["raca"];
    $cor = $_POST["cor"];
    $ong = $_POST["ong"];
    $enfermidade = $_POST["enfermidade"];
    $fotoanuncio = $_POST["fotoanuncio"];

    $sql = "INSERT INTO anuncio (nome, endereco, estado, cidade, cep, bairro, numero, idade, sexo, porte, raca, cor, enfermidade, fotoanuncio, ong) VALUES ('{$nome}', '{$endereco}', '{$estado}', '{$cidade}', '{$cep}', '{$bairro}', '{$numero}', '{$idade}', '{$sexo}', '{$porte}', '{$raca}', '{$cor}', '{$enfermidade}', '{$fotoanuncio}', '{$ong}')";
    if ($conn->query($sql) === true) {
        echo "Anúncio criado com sucesso.";
        header("Location: anuncio.php?nomef=$ong");
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
    <?php
    
    ?>
    <label class="letraform">Organização</label>
    <input type="text" name="ong" value="<?= $nomef ?>" readonly>
    </div>
    <div class="infoform">
        <label class="letraform">Estado</label>
        <input type="text" name="estado" placeholder="Insira o estado do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Cidade</label>
        <input type="text" name="cidade" placeholder="Insira a cidade do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Bairro</label>
        <input type="text" name="bairro" placeholder="Insira o bairro do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Endereço</label>
        <input type="text" name="endereco" placeholder="Insira o endereço do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Número</label>
        <input type="number" name="numero" placeholder="Insira o numero do endereço do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">CEP</label>
        <input type="number" name="cep" placeholder="Insira o CEP do animal" required>
    </div>
    <div class="infoform">
        <label class="letraform">Sexo</label>
        <select name="sexo" required>
                <option value="">Selecione o sexo</option>
                <option value="Macho">Macho</option>
                <option value="Fêmea">Fêmea</option>
            </select>
    </div>
    <div class="infoform">
        <label class="letraform">Porte</label>
        <select name="porte" required>
                <option value="">Selecione o porte</option>
                <option value="Pequeno">Pequeno</option>
                <option value="Médio">Médio</option>
                <option value="Grande">Grande</option>
            </select>
    </div>
    <div class="infoform">
        <label class="letraform">Data de nascimento</label>
        <input type="date" id="idadeseta" name="idade" required>
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
        <input type="file" name="fotoanuncio" id="fotoanuncio" accept="image/*">
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Criar</button>
    </div>
    <script>
let img = document.getElementById('img');
let input = document.getElementById('fotoanuncio')

input.onchange = (e) => {
    if (input.files[0])
        img.src = URL.createObjectURL(input.files[0]);
};
</script>
</form>
</div>
</div>
<br><br><br><br><br><br><br><br><br>
</div>
</div>
<?php
    include("footer.php");
?>