<?php
    include("header.php");
?>      
    <div id="cor">
    <br><br><br><br><br><br><br>
    <div id="espaco">
    <div id="contform">
<?php
    include ("config.php");

    if (isset($_REQUEST["cpf"]) && !empty($_REQUEST["cpf"])) {
        $cpf = $_REQUEST["cpf"];

        $sql = "SELECT * FROM usuario WHERE cpf=" . $cpf;
        $res = $conn->query($sql);

        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_object();

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "editar") {
                $cpf = $_POST["cpf"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $telefone = $_POST["telefone"];
                $senha = $_POST["senha"];
                $endereco = $_POST["endereco"];
                $estado = $_POST["estado"];
                $cidade = $_POST["cidade"];
                $cep = $_POST["cep"];
                $bairro = $_POST["bairro"];
                $numero = $_POST["numero"];
                $fotousu = $_POST["fotousu"];

                $sql = "UPDATE usuario SET cpf='{$cpf}', nome='{$nome}', email='{$email}', telefone='{$telefone}', senha='{$senha}', endereco='{$endereco}', estado='{$estado}', cidade='{$cidade}', cep='{$cep}', bairro='{$bairro}', numero='{$numero}', fotousu='{$fotousu}' WHERE cpf='{$cpf}'";

                if ($conn->query($sql) === TRUE) {
                    echo "Perfil atualizado com sucesso.";

                    header("Location: perfilusu.php?cpf='$row->cpf'");
                    exit;
                } else {
                    echo "Erro ao atualizar o perfil: " . $conn->error;
                }
            }
        } 
    }
?>

<div id="formulario">
<div class="tituloform">Atualizar Perfil</div>
<form action="?page=editarusu&cpf=<?php echo $_REQUEST["cpf"]; ?>" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="cpf" value="<?php echo $row->cpf; ?>">
    <div class="detalheform">
    <div class="infoform">
    <label class="letraform">Nome</label>
        <input type="text" name="nome" placeholder="Insira o seu nome completo" value="<?php echo $row->nome; ?>" required>
    </div>
    <div class="infoform">
        <label class="letraform">Email</label>
        <input type="text" name="email" placeholder="Insira o seu email" value="<?php echo $row->email; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">CPF</label>
        <input type="number" id="cpf" name="cpf" value="<?php echo $row->cpf; ?>" readonly>
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
        <label class="letraform">Telefone</label>
        <input type="number" name="telefone" placeholder="Insira o porte do animal" value="<?php echo $row->telefone; ?>"required>
    </div>
    <div class="infoform">
        <label class="letraform">senha</label>
        <input type="password" name="senha" placeholder="Insira a sua senha" value="<?php echo $row->senha; ?>"required>
    </div>
    </div>
    <div id="fotoanimalform">
    <div>
        <div>
            <?php
                if (!empty($row->fotousu)) {
                    echo '<img src="img/' . $row->fotousu . '" id="img" height="200" width="200">';
                } else {
                    echo '<img src="choose.png" id="img" height="200" width="200">';
                }
            ?>
        </div>
        <label>Foto do usuário: </label>
        <input type="file" name="fotousu" id="fotousu" accept="image/*" >
    </div>
</div>
    <div>
        <button id="buttoncriar" type="submit">Editar</button>
    </div>
</form>
</div>
</div>
<br><br><br><br><br><br>
</div>
</div>
<script>
let img = document.getElementById('img');
let input = document.getElementById('fotousu')

input.onchange = (e) => {
    if (input.files[0])
        img.src = URL.createObjectURL(input.files[0]);
};
</script>
</body>
<?php
    include("footer.php");
?>      