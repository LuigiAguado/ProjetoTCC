<?php
    include("header.php");
?>      
    <div id="cor">
    <br><br><br><br><br><br><br>
    <div id="espaco">
    <div id="contform">
<?php
    include ("config.php");

    if (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) {
        $id = $_REQUEST["id"];

        $sql = "SELECT * FROM anuncio WHERE id=" . $id;
        $res = $conn->query($sql);

        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_object();

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "editar") {
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

                $sql = "UPDATE anuncio SET nome='{$nome}', endereco='{$endereco}', estado='{$estado}', cidade='{$cidade}', cep='{$cep}', bairro='{$bairro}', numero='{$numero}', idade='{$idade}', sexo='{$sexo}', porte='{$porte}', raca='{$raca}', cor='{$cor}', enfermidade='{$enfermidade}', fotoanuncio='{$fotoanuncio}', ong='{$ong}' WHERE id='{$id}'";

                if ($conn->query($sql) === TRUE) {
                    echo "Anúncio atualizado com sucesso.";

                    header("Location: editanuncio.php?id='$id'");
                    exit;
                } else {
                    echo "Erro ao atualizar o anúncio: " . $conn->error;
                }
            }
        } else {
            echo "Anúncio não encontrado.";
        }
    } else {
        echo "ID do anúncio não especificado.";
    }
?>
<div id="formulario">
<div class="tituloform">Atualizar Anúncio</div>
<form action="?page=editaranuncio&id=<?php echo $_REQUEST["id"]; ?>" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome; ?>" required>
    </div>
    <div class="infoform">
        <label class="letraform">Organização</label>
        <input type="text" name="ong" value="<?php echo $row->ong; ?>" readonly>
    </div>
    <div class="infoform">
        <label class="letraform">Estado</label>
        <input type="text" name="estado" value="<?php echo $row->estado; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">Cidade</label>
        <input type="text" name="cidade" value="<?php echo $row->cidade; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">Bairro</label>
        <input type="text" name="bairro" value="<?php echo $row->bairro; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">Endereço</label>
        <input type="text" name="endereco" value="<?php echo $row->endereco; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">Número</label>
        <input type="number" name="numero" value="<?php echo $row->numero; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">CEP</label>
        <input type="number" name="cep" value="<?php echo $row->cep; ?>"required>
    </div>
    <div class="infoform">
    <label class="letraform">Sexo</label>
    <select name="sexo" required>
        <option value="">Selecione o sexo</option>
        <option value="Macho" <?php echo ($row->sexo == 'Macho') ? 'selected' : ''; ?>>Macho</option>
        <option value="Fêmea" <?php echo ($row->sexo == 'Fêmea') ? 'selected' : ''; ?>>Fêmea</option>
    </select>
</div>

<div class="infoform">
    <label class="letraform">Porte</label>
    <select name="porte" required>
        <option value="">Selecione o porte</option>
        <option value="Pequeno" <?php echo ($row->porte == 'Pequeno') ? 'selected' : ''; ?>>Pequeno</option>
        <option value="Médio" <?php echo ($row->porte == 'Médio') ? 'selected' : ''; ?>>Médio</option>
        <option value="Grande" <?php echo ($row->porte == 'Grande') ? 'selected' : ''; ?>>Grande</option>
    </select>
</div>
<div class="infoform">
        <label class="letraform">Idade (Aproximada)</label>
        <input type="date" id="idadeseta" name="idade" value="<?php echo $row->idade; ?>"required>
    </div>
<div class="infoform">
    <label class="letraform">Raça</label>
    <input type="text" name="raca" value="<?php echo $row->raca; ?>"required>
</div>

    <div class="infoform">
        <label class="letraform">Cor</label>
        <input type="text" name="cor" value="<?php echo $row->cor; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">Enfermidade</label>
        <input type="text" name="enfermidade" value="<?php echo $row->enfermidade; ?>">
    </div>
    </div>
    <div id="fotoanimalform">
    <div>
        <div>
            <?php
                if (!empty($row->fotoanuncio)) {
                    echo '<img src="img/' . $row->fotoanuncio . '" id="img" height="200" width="200">';
                } else {
                    echo '<img src="choose.png" id="img" height="200" width="200">';
                }
            ?>
        </div>
        <label>Foto do animal: </label>
        <input type="file" name="fotoanuncio" id="fotoanuncio" accept="image/*">
    </div>
</div>
    <div>
        <button id="buttoncriar" type="submit">Editar</button>
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
<br><br><br><br><br><br><br>
</div>
</div>
</body>
<?php
    include("footer.php");
?>      