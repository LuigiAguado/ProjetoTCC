<?php
include("config.php");

include("header.php");
if(!isset($_SESSION['id'])) {
    header("Location: escolhalogin.php");
}
?>

<div id="cor">
    <div>
        <!-- Adicione campos de pesquisa para nome e endereço e um botão de pesquisa -->
        <input type="text" id="nome_animal" placeholder="Pesquisar por nome">
        <input type="text" id="endereco_animal" placeholder="Pesquisar por endereço">
        <button onclick="filtrarAnimais()">Pesquisar</button>
    </div>
    <div id="adotetudo">
        <?php
        $sql = "SELECT fotoanuncio, nome, endereco, id FROM anuncio;";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
        ?>
                <div id="adoteall">
                    <div class="cardadote">
                        <a onclick="location.href='perfildog.php?id=<?php echo $row->id; ?>';">
                            <img src="img/<?php echo $row->fotoanuncio; ?>" width="130">
                            <h2><?php echo $row->nome; ?></h2>
                            <h3><?php echo $row->endereco; ?></h3>
                        </a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Não existem anúncios.</p>";
        }
        ?>
    </div>
</div>

<script>
    function filtrarAnimais() {
        var nomeAnimal = document.getElementById("nome_animal").value.toLowerCase();
        var enderecoAnimal = document.getElementById("endereco_animal").value.toLowerCase();
        var cards = document.querySelectorAll(".cardadote");

        for (var i = 0; i < cards.length; i++) {
            var animalNome = cards[i].getElementsByTagName("h2")[0].innerText.toLowerCase();
            var animalEndereco = cards[i].getElementsByTagName("h3")[0].innerText.toLowerCase();

            if (animalNome.includes(nomeAnimal) && animalEndereco.includes(enderecoAnimal)) {
                cards[i].parentElement.style.display = "block";
            } else {
                cards[i].parentElement.style.display = "none";
            }
        }
    }
</script>

<?php
include("footer.php");

?>
