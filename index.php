<?php
include('header.php');
?>
    <div id="conteudo">
        <div class="resumovideo">
            <div class="imgdog">
                <img class="imgdogtam" src="img/Pegadas.png">
            </div>
            <div class="video">
                <video class="contvideo" src="vid/teste.mp4" controls poster="img/Dog.jpg"></video>
            </div>
            <div class="imgdog">
                <img class="imgdogtam" src="img/Pegadas2.png">
            </div>
        </div>
        <div id="sobretxt">
        <div class="resumotxt">
            <div class="imgdogres">
                <img class="imgdogrestam" src="img/cachorro3.png">
            </div>
            <div class="resumotexto">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda nemo praesentium vitae sequi accusantium suscipit quam enim odio modi, quisquam quaerat minus voluptas et expedita reprehenderit. Saepe unde impedit distinctio!</p>
            </div>
        </div>
        </div>
    </div>
    <div class="ong-div">
        <div class="ong-text">
            <p>Seja parte da nossa comunidade!</p>
            <img src="img/amordepatas.png" alt="Imagem de uma ONG" />
        </div>
        <div class="ong-button">
            <a href="contato.php" class="cadastro-button">É uma ONG? Venha se cadastrar!</a>
        </div>
    </div>

    <div class="pessoa-div">
    <div class="pessoa-text">
        <p>Quer adotar um animal?</p>
    </div>
    <div class="animal-images">
        <img src="img/cachorro.png" alt="Imagem de um animal para adoção" style="max-width: 150px; height: auto;" />
        <img src="img/cachorro.png" alt="Imagem de um animal para adoção" style="max-width: 150px; height: auto;" />
        <img src="img/cachorro.png" alt="Imagem de um animal para adoção" style="max-width: 150px; height: auto;" />

    </div>
    <div class="adotar-button">
        <a href="contato.php" class="cadastro-button">Quer adotar? Se cadastre em nosso site!</a>
    </div>
</div>
<?php echo '<button onclick="location.href=\'logout.php\';">Sair</button>';?>
<?php include('footer.php'); ?>







