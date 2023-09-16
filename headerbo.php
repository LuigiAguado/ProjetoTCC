
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
                    <a href="index.php">
                        <img class="logotam" src="img/amordepatas.png">
                    </a>
                </p>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="index.php#sobretxt" class="nav-link" style="color: #fff;">Sobre</a></li>
                    <li class="nav-item"><a href="adote.php" class="nav-link" style="color: #fff;">Adote</a></li>
                    <li class="nav-item"><a href="contato.php" class="nav-link" style="color: #fff;">Contato</a></li>
                </ul>
            </div>
            <div class="login-button">
                <button><a href="loginusu.php"><?php include('protecet.php'); echo $_SESSION['nome']; ?></a></button>
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
                <button><a href="loginusu.php"><?php include('protecet.php'); echo $_SESSION['nome']; ?></a></button>
            </div>
        </div>

    </header>