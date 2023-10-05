<?php
    include("header.php");
?>
    <div id="cor">
    <br><br><br><br><br>
    <div id="espaco">
    <div id="contform">
<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "cadastrar") {
    
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
    $confirmasenha = $_POST["confirmasenha"];
    $duplicado = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$cpf' OR email = '$email'");

    if (mysqli_num_rows($duplicado) > 0) {
        echo "<script> alert('Email ou CPF já cadastrado!'); </script>";
    } else {
        if($senha == $confirmasenha){
            $sql = "INSERT INTO usuario (cpf, nome, email, telefone, senha, endereco, estado, cidade, cep, bairro, numero, fotousu) VALUES ('{$cpf}', '{$nome}', '{$email}', '{$telefone}', '{$senha}', '{$endereco}', '{$estado}', '{$cidade}', '{$cep}', '{$bairro}', '{$numero}', '{$fotousu}')";
            mysqli_query($conn,$sql);
            header("Location: loginusu.php");
            echo "<script> alert('Usuário registrado com sucesso!'); </script>";
        } else{
            echo "<script> alert('Senha Divergente!'); </script>";
    }
}
}
?>
<div id="formulario">
    <div class="tituloform">Criar Usuário <a href="criarong.php">Criar ONG</a></div>
<form action="?page=criarusu" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Nome</label>
        <input type="text" name="nome" placeholder="Insira o seu nome completo" required>
    </div>
    <div class="infoform">
        <label class="letraform">Email</label>
        <input type="text" name="email" placeholder="Insira o seu email" required>
    </div>
    <div class="infoform">
        <label class="letraform">CPF</label>
        <input type="number" id="cpf" name="cpf" value="0" min="0" required>
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
        <label>Foto do Usuário: </label>
        <input type="file" name="fotousu" id="fotousu" accept="image/*">
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Criar</button>
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
</div>
</div>
<?php
    include("footer.php");
?>