<?php
    include("header.php");
?>

<h1>Possui alguma dúvida?</h1>
<h3>insira sua dúvida a baixo e a nossa equipe ira te ajudar.</h3>
<div id="formulario">
<form method="POST" action="enviaremail.php">
    <div class="detalheform">
    <div class="infoform">
        <label for="name">Nome</label>
        <input type="text" name="nome" id="nome" required>
    </div>
    <div class="infoform">
        <label for="name">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div class="infoform">
        <label for="name">Assunto</label>
        <input type="text" name="assunto" id="assunto" required>
    </div>
    <div class="infoform">
        <label for="name">Mensagem</label>
        <input type="message" name="mensagem" id="mensagem" required>
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