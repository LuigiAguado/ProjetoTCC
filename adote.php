<?php
    include("config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>TCC</title>
</head>

<body>
    <header>
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
                    <li class="nav-item"><a href="index.html#sobretxt" class="nav-link" style="color: #fff;">Sobre</a></li>
                    <li class="nav-item"><a href="adote.php" class="nav-link" style="color: #fff;">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link" style="color: #fff;">Contato</a></li>
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
                    <li class="nav-item"><a href="index.html#sobretxt" class="nav-link" style="color: #fff;">Sobre</a></li>
                    <li class="nav-item"><a href="adote.php" class="nav-link" style="color: #fff;">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link" style="color: #fff;">Contato</a></li>
            </ul>
            <div class="login-button">
                <button><a href="loginusu.php">Entrar</a></button>
            </div>
        </div>

    </header>
    <div  class="conteudoadote">
    <div class="galeria">
        <article class="cartao">
            <figure>
            <?php
        $sql = "SELECT * FROM anuncio";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {

                echo '<img src="img/'.$row->fotoanuncio.'" width = "200">';
            }
        }else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
        <figcaption>
        <?php
        $sql = "SELECT * FROM anuncio";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                echo $row->nome . "<br>";
                echo $row->endereco . "<br>";
            }
        }else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
        </figcaption>
            </figure>

        </article>

    </div>
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