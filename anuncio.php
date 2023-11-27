<?php
include("config.php");
include("header.php");
?>

<div id="cor">
    <br><br><br><br>
        <div class="criarbotao">
        <?php
        $nomef = $_GET["nomef"];
            ?>
            <a href="criaranuncio.php?nomef=<?= $nomef ?>" style="text-decoration: none;"><p>Criar novo anúncio</p>
                <img src="img/sinal2.png" alt="+" width="25" height="25">
            </a>
            <br>
    </div>
    <div id="filtro-container">
        <button id="filtro-btn" onclick="toggleFiltro()">Filtro</button>
        
        <div id="filtro-opcoes" class="escondido">
            <input type="text" id="nome_animal" placeholder="Pesquisar por nome">
            <input type="text" id="endereco_animal" placeholder="Pesquisar por cidade">
            <select name="sexo" id="sexo">
                <option value="">Selecione o sexo</option>
                <option value="Macho">Macho</option>
                <option value="Fêmea">Fêmea</option>
            </select>
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
    </div>
    <div id="adotetudo">
        <?php
        if (isset($_GET["nomef"]) && !empty($_GET["nomef"])) {
            $nomef = $_GET["nomef"];

            $sql = "SELECT nome, cidade, fotoanuncio, id FROM anuncio WHERE ong = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $nomef);
            $stmt->execute();
            $res = $stmt->get_result();
            $qtd = $res->num_rows;

            if ($qtd > 0) {
                while ($row = $res->fetch_object()) {
            ?>
            <div class="cardadote">
                <a onclick="location.href='editanuncio.php?id=<?php echo $row->id; ?>';">
                <img src="img/<?php echo $row->fotoanuncio; ?>" width="130" height="170">
                <h2><?php echo $row->nome; ?></h2>
                <h3><?php echo $row->cidade; ?></h3>
                <p class="sexo informacao-oculta"><?php echo $row->sexo; ?></p>
                <p class="porte informacao-oculta"><?php echo $row->porte; ?></p>
                <p class="raca informacao-oculta"><?php echo $row->raca; ?></p>
                <p class="enfermidade informacao-oculta"><?php echo $row->enfermidade; ?></p>
            </a>
        </div>

        <?php
            }
        } else {
            echo "<p>Não existem anúncios.</p>";
        }
    }
        ?>
    </div>
</div>
<script src="filtroaparece.js"></script>
<script>
    function filtrarAnimais() {
        var nomeAnimal = document.getElementById("nome_animal").value.toLowerCase();
        var enderecoAnimal = document.getElementById("endereco_animal").value.toLowerCase();
        var sexoAnimal = document.getElementById("sexo").value.toLowerCase();
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
