<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>TCC</title>
</head>

<body>
    <header cl>
        <nav class="nav-bar">
            <div class="logo">
            <p>
                <a href="index.html">
                    <img class="logotam" src="img/amordepatas.png">
                </a>
            </p>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="index.html#sobretxt" class="nav-link">Sobre</a></li>
                    <li class="nav-item"><a href="adote.php" class="nav-link">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
                </ul>
            </div>
            <div class="login-button">
                <button><a href="loginusu.php">Entrar</a></button>
            </div>
            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="img/menubranco.svg"></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                    <li class="nav-item"><a href="index.html#sobretxt" class="nav-link">Sobre</a></li>
                    <li class="nav-item"><a href="adote.php" class="nav-link">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
            </ul>
            <div class="login-button">
                <button><a href="loginusu.php">Entrar</a></button>
            </div>
        </div>
    </header>
    <div style="background: linear-gradient(135deg, #0187a7, #016d88);">
    <br><br><br><br><br>
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
    $fotoong = $_POST["fotoong"];
    $confirmasenha = $_POST["confirmasenha"];
    $duplicado = mysqli_query($conn, "SELECT * FROM ong WHERE CNPJ = '$CNPJ' OR email = '$email'");

    if (mysqli_num_rows($duplicado) > 0) {
        echo "<script> alert('Email ou CNPJ já cadastrado!'); </script>";
    } else {
        if($senha == $confirmasenha){
            $sql = "INSERT INTO ong (CNPJ, nomef, razao, telefone, email, senha, endereco, fotoong) VALUES ('{$CNPJ}', '{$nomef}', '{$razao}', '{$telefone}', '{$senha}', '{$email}', '{$endereco}', '{$fotoong}')";
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
    <div class="tituloform">Criar Usuário</div>
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
        <label class="letraform">Endereço</label>
        <input type="text" name="endereco" placeholder="Insira o endereço" required>
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
<br><br><br><br><br>
</div>
<footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <p>
                    <a href="index.html">
                        <img class="logofootertam" src="img/amordepatas.png">
                    </a>
                </p>
            </div>

            <div id="footer_social_media">
                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>

            <div id="footer_subscribe">
                <h3>Dúvidas</h3>

                <p>
                    Caso tenha alguma pergunta, clique no botão a baixo.
                </p>
                        <a href="contato.php" id="duvidasbutton">?</a>
                </div>
            </div>
        </div>

        <div id="footer_copyright">
            &#169
            2023 all rights reserved
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>