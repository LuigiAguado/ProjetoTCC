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
                    <li class="nav-item"><a href="anuncio.php" class="nav-link">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
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
                    <li class="nav-item"><a href="index.html#sobretxt" class="nav-link">Sobre</a></li>
                    <li class="nav-item"><a href="anuncio.php" class="nav-link">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
            </ul>
            <div class="login-button">
                <button><a href="ecolhalogin.php">Entrar</a></button>
            </div>
        </div>
    </header>
    <div id="contform">
<?php
    include ("config.php");
    // Verificar se o parâmetro "id" está definido e não vazio
    if (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) {
        $id = $_REQUEST["id"];

        $sql = "SELECT * FROM anuncio WHERE id=" . $id;
        $res = $conn->query($sql);

        // Verificar se a consulta retornou algum resultado
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_object();

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["acao"]) && $_POST["acao"] == "editar") {
                $nome = $_POST["nome"];
                $endereco = $_POST["endereco"];
                $idade = $_POST["idade"];
                $sexo = $_POST["sexo"];
                $porte = $_POST["porte"];
                $raca = $_POST["raca"];
                $cor = $_POST["cor"];
                $enfermidade = $_POST["enfermidade"];
                $fotoanuncio = $_POST["fotoanuncio"];

                $sql = "UPDATE anuncio SET nome='{$nome}', endereco='{$endereco}', idade='{$idade}', sexo='{$sexo}', porte='{$porte}', raca='{$raca}', cor='{$cor}', enfermidade='{$enfermidade}', fotoanuncio='{$fotoanuncio}' WHERE id='{$id}'";

                if ($conn->query($sql) === TRUE) {
                    echo "Anúncio atualizado com sucesso.";
                    // Redirecionar para a página de anúncios
                    header("Location: anuncio.php");
                    exit;
                } else {
                    echo "Erro ao atualizar o anúncio: " . $conn->error;
                }
            }
        } else {
            echo "Anúncio não encontrado.";
        }
    } else {
        echo "ID do anúncio não especificado.";
    }
?>
<div id="formulario">
<div class="tituloform">Atualizar Anúncio</div>
<form action="?page=editaranuncio&id=<?php echo $_REQUEST["id"]; ?>" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Endereço</label>
        <input type="text" name="endereco" value="<?php echo $row->endereco; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Idade (Aproximada)</label>
        <input type="number" id="idadeseta" name="idade" value="<?php echo $row->idade; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Sexo</label>
        <input type="text" name="sexo" value="<?php echo $row->sexo; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Porte</label>
        <input type="text" name="porte" value="<?php echo $row->porte; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Raça</label>
        <input type="text" name="raca" value="<?php echo $row->raca; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Cor</label>
        <input type="text" name="cor" value="<?php echo $row->cor; ?>">
    </div>
    <div class="infoform">
        <label class="letraform">Enfermidade</label>
        <input type="text" name="enfermidade" value="<?php echo $row->enfermidade; ?>">
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