<?php
    include("header.php");
?>

<div class="h1contatoc">
<h1>Possui alguma dúvida?</h1>
</div>
<div id="contformc">

<div id="formularioc">
<div class="tituloformc">Insira sua dúvida a baixo e a nossa equipe ira te ajudar</div>
<form method="POST" action="enviaremail.php">
    <div class="detalheformc">
    <div class="infoformc">
        <label for="name">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Insira seu nome" required>
    </div>
    <div class="infoformc">
        <label for="name">Email</label>
        <input type="email" name="email" id="email" placeholder="Insira seu email" required>
    </div>
    <div class="infoformcc  ">
        <label for="name">Assunto</label>
        <input type="text" name="assunto" id="assunto" placeholder="Insira o assunto" required>
        <br><br>
        <label for="name">Mensagem</label>
        <input type="message" name="mensagem" id="mensagem" placeholder="Insira sua mensagem" style="height: 65px;" required>
    </div>
    </div>
    <div>
        <button id="buttoncriarc" type="submit">Enviar</button>
    </div>
    </form>
    </div>
    </div>
    <div class="h1contatoc">
</div>
<?php
    include("footer.php");
?>