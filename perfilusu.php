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
    <link rel="stylesheet" href="anuncio.css">
    <title>TCC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
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
                    <li class="nav-item"><a href="anuncio.php" class="nav-link" style="color: #fff;">Adote</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" style="color: #fff;">Contato</a></li>
                </ul>
            </div>
            <div class="login-button">
                <button><a href="ecolhalogin.php">Entrar</a></button>
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
                <button><a href="ecolhalogin.php">Entrar</a></button>
            </div>
        </div>

    </header>
    <div class="fundo">
    <br><br><br><br>
    
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <?php
        $sql = "SELECT * FROM usuario";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
                echo $row->nome . "<br>";
                echo $row->email . "<br>";
                echo $row->cpf . " anos <br>";
                echo $row->endereco . "<br>";
                echo $row->telefone . "<br>";
                echo $row->senha . "<br>";
                echo $row->fotousu . "<br>";

                echo '<div class="botoes-container">';
                echo '<button class="meu-botao" onclick="location.href=\'editarusuario.php?id='.$row->cpf.'\';">Editar</button>';
                echo '<button class="meu-botao excluir" onclick="if(confirm(\'Tem certeza que deseja excluir o anúncio?\')){location.href=\'exluiranuncio.php?id='.$row->cpf.'\';}else{false;}">Excluir</button>';
                echo '</div>';
                
            }
        } 
        ?>
            </div>
        </div>

        <br><br>

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