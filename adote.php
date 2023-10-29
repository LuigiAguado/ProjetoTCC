<?php
include("config.php");
include("header.php");

if(!isset($_SESSION['id'])) {
    header("Location: escolhalogin.php");
}
?>

<div id="cor">
    <div>
        <input type="text" id="nome_animal" placeholder="Pesquisar por nome">
        <input type="text" id="endereco_animal" placeholder="Pesquisar por endereço">
        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" id="sexo_macho" value="Macho"> Macho
        <input type="radio" name="sexo" id="sexo_femea" value="Fêmea"> Fêmea
        <select id="porte">
            <option value="">Selecione o porte</option>
            <option value="Pequeno">Pequeno</option>
            <option value="Médio">Médio</option>
            <option value="Grande">Grande</option>
        </select>
        <input type="text" id="raca" placeholder="Pesquisar por raça">
        <input type="text" id="enfermidade" placeholder="Pesquisar por enfermidade">
        <button onclick="filtrarAnimais()">Pesquisar</button>
    </div>
    <div id="adotetudo">
        <?php
        $sql = "SELECT * FROM anuncio;";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            while ($row = $res->fetch_object()) {
        ?>
                <div class="cardadote">
                    <a onclick="location.href='perfildog.php?id=<?php echo $row->id; ?>';">
                        <img src="img/<?php echo $row->fotoanuncio; ?>" width="130">
                        <h2><?php echo $row->nome; ?></h2>
                        <h3><?php echo $row->endereco; ?></h3>
                        <p class="sexo"><?php echo $row->sexo; ?></p>
                        <p class="porte"><?php echo $row->porte; ?></p>
                        <p class="raca"><?php echo $row->raca; ?></p>
                        <p class="enfermidade"><?php echo $row->enfermidade; ?></p>
                    </a>
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
        var sexoAnimal = document.querySelector('input[name="sexo"]:checked') ? document.querySelector('input[name="sexo"]:checked').value : "";
        var porteAnimal = document.getElementById("porte").value.toLowerCase();
        var racaAnimal = document.getElementById("raca").value.toLowerCase();
        var enfermidadeAnimal = document.getElementById("enfermidade").value.toLowerCase();
        var cards = document.querySelectorAll(".cardadote");

        for (var i = 0; i < cards.length; i++) {
            var animalNome = cards[i].getElementsByTagName("h2")[0].innerText.toLowerCase();
            var animalEndereco = cards[i].getElementsByTagName("h3")[0].innerText.toLowerCase();
            var animalSexo = cards[i].querySelector('.sexo').innerText.toLowerCase();
            var animalPorte = cards[i].querySelector('.porte').innerText.toLowerCase();
            var animalRaca = cards[i].querySelector('.raca').innerText.toLowerCase();
            var animalEnfermidade = cards[i].querySelector('.enfermidade').innerText.toLowerCase();

            if (animalNome.includes(nomeAnimal) &&
                animalEndereco.includes(enderecoAnimal) &&
                (sexoAnimal === "" || animalSexo.includes(sexoAnimal)) &&
                (porteAnimal === "" || animalPorte.includes(porteAnimal)) &&
                animalRaca.includes(racaAnimal) &&
                animalEnfermidade.includes(enfermidadeAnimal)) {
                cards[i].style.display = "block";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>

<?php
include("footer.php");
?>
