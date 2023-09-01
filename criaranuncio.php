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