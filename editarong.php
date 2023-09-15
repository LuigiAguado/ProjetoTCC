<?php
    include("header.php");
?>      
    <div style="background: linear-gradient(135deg, #0187a7, #016d88);">
    <br><br><br><br><br>
    <div id="contform">
<?php
    include ("config.php");

    if (isset($_REQUEST["CNPJ"]) && !empty($_REQUEST["CNPJ"])) {
        $cpf = $_REQUEST["CNPJ"];

        $sql = "SELECT * FROM ong WHERE CNPJ=" . $CNPJ;
        $res = $conn->query($sql);

        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_object();

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "editar") {
                $cnpj = $_POST["CNPJ"];
                $nomef = $_POST["nomef"];
                $razao = $_POST["razao"];
                $telefone = $_POST["telefone"];
                $senha = $_POST["senha"];
                $email = $_POST["email"];
                $endereco = $_POST["endereco"];
                $fotoong = $_POST["fotoong"];

                $sql = "UPDATE ong SET CNPJ='{$CNPJ}', nomef='{$nomef}', razao='{$razao}', telefone='{$telefone}', senha='{$senha}', email='{$email}', endereco='{$endereco}', fotoong='{$fotoong}'";

                if ($conn->query($sql) === TRUE) {
                    echo "Perfil atualizado com sucesso.";

                    header("Location: perfilusu.php");
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
<form action="?page=editarong&CNPJ=<?php echo $_REQUEST["CNPJ"]; ?>" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="CNPJ" value="<?php echo $row->CNPJ; ?>">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Nome Fantasia</label>
        <input type="text" name="nomef" placeholder="Insira o nome fantasia" value="<?php echo $row->nomef; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Razão social</label>
        <input type="text" name="razao" placeholder="Insira a razão social" value="<?php echo $row->razao; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Email</label>
        <input type="text" name="email" placeholder="Insira o email" value="<?php echo $row->email; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">CNPJ</label>
        <input type="number" id="CNPJ" name="CNPJ" value="0" min="0" value="<?php echo $row->CNPJ; ?>" disabled>
    </div>
    <div class="infoform">
        <label class="letraform">Endereço</label>
        <input type="text" name="endereco" placeholder="Insira o endereço" value="<?php echo $row->endereco; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Telefone</label>
        <input type="number" name="telefone" placeholder="Insira o telefone" value="<?php echo $row->telefone; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">senha</label>
        <input type="password" name="senha" placeholder="Insira a sua senha" value="<?php echo $row->senha; ?>">
    </div>
    </div>
    <div id="fotoanimalform">
    <div>
        <div>
       <img src="choose.png" id="img" height="200" width="200"> 
        </div>
        <label>Foto do usuário: </label>
        <input type="file" name="fotoong" id="fotoong" accept="image/*">
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Editar</button>
    </div>
</form>
</div>
</div>
<br><br><br><br>
</div>
<script>
let img = document.getElementById('img');
let input = document.getElementById('fotoong')

input.onchange = (e) => {
    if (input.files[0])
        img.src = URL.createObjectURL(input.files[0]);
};
</script>
</body>
<?php
    include("footer.php");
?>      