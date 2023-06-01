<?php
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $endereco = $_POST["endereco"];
            $idade = $_POST["idade"];
            $sexo = $_POST["sexo"];
            $porte = $_POST["porte"];
            $raca = $_POST["raca"];
            $cor = $_POST["cor"];
            $enfermidade = $_POST["enfermidade"];
            $fotoanuncio = $_POST["fotoanuncio"];

            $sql = "INSERT INTO anuncio (nome, endereco, idade, sexo, porte, raca, cor, enfermidade, fotoanuncio) VALUES ('{$nome}', '{$endereco}', '{$idade}', '{$sexo}', '{$porte}', '{$raca}', '{$cor}', '{$enfermidade}', '{$fotoanuncio}')";
            
            $res = $conn->query($sql);

            if($res==true){
                print "<script>location.href='?page=anuncio'</script>";
            }else{
                print "<script>alert('Não foi possível realizar o cadastro');</script>";
                print "<script>location.href='?page=anuncio';</script>";
            }
            echo $sql;
            break;
        
        case 'editar':
            $nome = $_POST["nome"];
            $endereco = $_POST["endereco"];
            $idade = $_POST["idade"];
            $sexo = $_POST["sexo"];
            $porte = $_POST["porte"];
            $raca = $_POST["raca"];
            $cor = $_POST["cor"];
            $enfermidade = $_POST["enfermidade"];
            $fotoanuncio = $_POST["fotoanuncio"];

            $sql = "UPDATE anuncio SET nome='{$nome}', endereco='{$endereco}', idade='{$idade}', sexo='{$sexo}', porte='{$porte}', raca='{$raca}', cor='{$cor}', enfermidade='{$enfermidade}', fotoanuncio='{$fotoanuncio}' WHERE id=".$_REQUEST["id"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>location.href='?page=anuncio'</script>"; 
            }else{
                print "<script>alert('Não foi possível realizar a edição');</script>";
                print "<script>location.href='?page=anuncio';</script>";
            }

            break;

        case 'excluir':
            
            $sql = "DELETE FROM anuncio WHERE id=".$_REQUEST["id"];

            if($res==true){
                print "<script>location.href='?page=anuncio'</script>"; 
            }else{
                print "<script>alert('Não foi possível realizar a exclusão');</script>";
                print "<script>location.href='?page=anuncio';</script>";
            }

            break;
    }

?>