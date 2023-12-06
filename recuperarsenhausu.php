<?php
include('header.php');
?>
<div id="contformc">
<div id="formularioc">
<div class="tituloformc">Recupere sua senha!</div>
<form method="POST" action="enviaremailsenha.php">
    <div class="detalheformc">
    <div class="infoformcc">
        <label for="name">Email</label>
        <input type="email" name="email" id="email" placeholder="Insira seu email" required>
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
include('footer.php');
?>