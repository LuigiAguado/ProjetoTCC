<!-- index.php -->
<?php
    include("config.php");
?>

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
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <p>
                    <a href="index.html">
                        <img class="logotam" src="img/logo.png">
                    </a>
                </p>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="index.html#sobretxt" class="nav-link">Sobre</a></li>
                    <li class="nav-item"><a href="anuncio.php" class="nav-link">Adote</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contato</a></li>
                </ul>
            </div>
            <div class="login-button">
                <button><a href="#">Entrar</a></button>
            </div>
            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="img/menubranco.svg"></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Adote</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contato</a></li>
            </ul>
            <div class="login-button">
                <button><a href="#">Entrar</a></button>
            </div>
        </div>

    </header>

    <div>
        <div>
            <a href="criaranuncio.php">Novo Anúncio</a>
        </div>
    </div>

    <div>
        <?php
        $sql = "SELECT * FROM anuncio";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                echo $row->nome;
                echo $row->endereco;
                echo $row->idade;
                echo $row->sexo;
                echo $row->porte;
                echo $row->raca;
                echo $row->cor;
                echo $row->enfermidade;
                echo $row->fotoanuncio;

                echo "<button onclick=\"location.href='editarusuario.php?id=".$row->id."';\">Editar</button>";
                echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir o anúncio?')){location.href='exluiranuncio.php?id=".$row->id."';}else{false;}\">Excluir</button>";
            }
        } else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
    </div>
    
    <br><br><br><br><br><br><br><br>
    <br>

    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <p>
                    <a href="index.html">
                        <img class="logofootertam" src="img/logo.png">
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
                    Caso tenha alguma pergunta, clique no botão abaixo.
                </p>

                <button id="duvidasbutton">
                    <i class="fa-solid fa-question"></i>
                </button>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
