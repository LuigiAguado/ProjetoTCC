<?php
    include("header.php");
?>

<h1>Possui alguma dúvida?</h1>
<h3>insira sua dúvida a baixo e a nossa equipe ira te ajudar.</h3>
<div id="formulario">
<form action="?page=criaranuncio" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="detalheform">
    <div class="infoform">
        <label class="letraform">Nome</label>
        <input type="text" name="nome">
    </div>
    <div class="infoform">
        <label class="letraform">email</label>
        <input type="text" name="email">
    </div>
    <div class="infoform">
        <label class="letraform">Dúvida</label>
        <input type="text" name="duvida" placeholder="Insira a sua dúvida" required>
    </div>
    </div>
    <div>
        <button id="buttoncriar" type="submit">Enviar</button>
    </div>
    </form>
    </div>
    
<?php
    include("footer.php");
?>