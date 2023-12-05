<?php
    include("header.php");
?>
    <div id="cor">
    <br><br><br><br><br><br><br>
    <div id="espaco">
    <div id="contform">
<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "cadastrar") {
    
    $CNPJ = $_POST["CNPJ"];
    $nomef = $_POST["nomef"];
    $razao = $_POST["razao"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $fotoong = $_POST["fotoong"];
    $confirmasenha = $_POST["confirmasenha"];
    $duplicado = mysqli_query($conn, "SELECT * FROM ong WHERE CNPJ = '$CNPJ' OR email = '$email'");

    if (mysqli_num_rows($duplicado) > 0) {
        echo "<script> alert('Email ou CNPJ já cadastrado!'); </script>";
    } else {
        if($senha == $confirmasenha){
            $sql = "INSERT INTO ong (CNPJ, nomef, razao, telefone, endereco, estado, cidade, cep, bairro, numero, senha, fotoong, email) VALUES ('{$CNPJ}', '{$nomef}', '{$razao}', '{$telefone}', '{$endereco}', '{$estado}', '{$cidade}', '{$cep}', '{$bairro}', '{$numero}', '{$senha}', '{$fotoong}', '{$email}')";
            mysqli_query($conn,$sql);
            header("Location: loginong.php");
            echo "<script> alert('Usuário registrado com sucesso!'); </script>";
        } else{
            echo "<script> alert('Senha Divergente!'); </script>";
    }
}
}
?>
<div id="formulario">
    <div class="tituloform">Criar Organização <a href="criarusu.php">Criar Usuário</a></div>
<form action="?page=criarong" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Nome Fantasia</label>
        <input type="text" name="nomef" placeholder="Insira o nome fantasia" required>
    </div>
    <div class="infoform">
        <label class="letraform">Razão social</label>
        <input type="text" name="razao" placeholder="Insira a razão social" required>
    </div>
    <div class="infoform">
        <label class="letraform">Email</label>
        <input type="text" name="email" placeholder="Insira o email" required>
    </div>
    <div class="infoform">
        <label class="letraform">CNPJ</label>
        <input type="number" id="CNPJ" name="CNPJ" value="0" min="0" required>
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
        <label class="letraform">Telefone</label>
        <input type="number" name="telefone" placeholder="Insira o telefone" required>
    </div>
    <div class="infoform">
        <label class="letraform">senha</label>
        <input type="password" name="senha" placeholder="Insira a sua senha" required>
    </div>
    <div class="infoform">
        <label class="letraform">Confirme sua senha</label>
        <input type="password" name="confirmasenha" placeholder="Confirme sua senha" required>
    </div>
    </div>
    <div id="fotoanimalform">
    <div>
        <div>
       <img src="choose.png" id="img" height="150" width="150"> 
        </div>
        <label>Foto da instituição: </label>
        <input type="file" name="fotoong" id="fotoong" accept="image/*">
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Criar</button>
    </div>
    <script>
let img = document.getElementById('img');
let input = document.getElementById('fotoong')

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
<?php
    include("footer.php");
?>