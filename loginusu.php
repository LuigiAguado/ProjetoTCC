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
    <div id="contform">
    <?php
include('config.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else{

        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome'] = $usuario['nome'];

            header("Localização: index.html");

        } else {
            echo "Falha ao logar! E-mail ou senha incorreta";
        }

    }

}
?>
<div id="formulario">
    <div class="tituloform">Login</div>
<form action="?" method="POST">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Email: </label>
        <input type="text" name="email" placeholder="Insira o seu email" required>
    </div>
    <div class="infoform">
        <label class="letraform">Senha: </label>
        <input type="password" name="senha" placeholder="Insira a sua senha" required>
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Entrar</button>
    </div>
    <br><br>
    <div id="naocadastro" style="
    display: flex;
    align-items: center;
    justify-content: center;">  
    <p>Ainda não possue login? </p>     
        <a href="criarusu.php" 
        style="color: black;">
                Cadastrar
        </a>
    </div>
</form>
</div>
<div>
</div>
</div>
</body>
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