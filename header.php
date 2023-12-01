<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/foter.css">
    <title>TCC</title>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <p>
                    <a href="index.php">
                        <img class="logotam" src="img/amordepatas.png">
                    </a>
                </p>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="index.php#sobretxt" class="nav-link" style="color: #fff;">Sobre</a></li>
                    <li class="nav-item"><a href="adote.php" class="nav-link" style="color: #fff;">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link" style="color: #fff;">Ajuda</a></li>
                </ul>
            </div>
            <div class="login-button">
            <script>
function toggleMenu(menuId) {
  var menu = document.getElementById(menuId);
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
}
</script>
  <?php
  session_start();
  if (isset($_SESSION['nome'])) { 
      echo '<button class="toggle-button" onclick="toggleMenu(\'menu-usuario\')"><a>'. $_SESSION['nome'] .'</a></button>';
      echo '<div id="menu-usuario" class="menu" style="display:none;">';
      echo '<ul>';
      echo '<li><a href=perfilusu.php?cpf=' .$_SESSION['id'].'>Perfil</a></li>';
      echo '</ul>';
      echo '</div>';
  } else if (isset($_SESSION['nomef'])) { 
      echo '<button class="toggle-button" onclick="toggleMenu(\'menu-ong\')"><a>'. $_SESSION['nomef'] .'</a></button>';
      echo '<div id="menu-ong" class="menu" style="display:none;">';
      echo '<ul>';
      echo '<li><a href=perfilong.php?CNPJ=' .$_SESSION['id'].'>Perfil</a></li>';
      echo '<li><a href=anuncio.php?nomef=' .$_SESSION['nomef'].'>Anúncio</a></li>';
      echo '</ul>';
      echo '</div>';
  } else {
      echo '<button><a href="escolhalogin.php">ENTRAR</a></button>';
  }
  ?>
</div>
            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="img/menubranco.svg"></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                    <li class="nav-item"><a href="index.php#sobretxt" class="nav-link" style="color: #fff;">Sobre</a></li>
                    <li class="nav-item"><a href="adote.php" class="nav-link" style="color: #fff;">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link" style="color: #fff;">Contato</a></li>
            </ul>
            <div class="login-button">
                <div class="dropdown">
                    <div class="contperfil">
                    <?php
  session_start();
  if (isset($_SESSION['nome'])) { 
      echo '<button class="toggle-button" onclick="toggleMenu(\'menu-usuario\')"><a>'. $_SESSION['nome'] .'</a></button>';
      echo '<div id="menu-usuario" class="menu" style="display:none;">';
      echo '<ul>';
      echo '<li><a href="perfilusu.php">Perfil</a></li>';
      echo '</ul>';
      echo '</div>';
  } else if (isset($_SESSION['nomef'])) { 
      echo '<button class="toggle-button" onclick="toggleMenu(\'menu-ong\')"><a>'. $_SESSION['nomef'] .'</a></button>';
      echo '<div id="menu-ong" class="menu" style="display:none;">';
      echo '<ul>';
      echo '<li><a href="perfilong.php">Perfil</a></li>';
      echo '<li><a href="anuncio.php">Anúncio</a></li>';
      echo '</ul>';
      echo '</div>';
  } else {
      echo '<button><a href="escolhalogin.php">ENTRAR</a></button>';
  }
  ?>
                    </div>
                </div>
            </div>
        </div>

    </header>