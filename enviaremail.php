<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try{
    $mail->isSMTP();
    $mail->Host = "smtp-relay.brevo.com";
    $mail->SMTPAuth = true;
    $mail->Username = "luigiaguado@hotmail.com";
    $mail->Password = "cdp3wWx0zT8CNHSb";
    $mail->Port = 587;

    $mail->setFrom($email, $nome);
    $mail->addAddress('luigiaguado@hotmail.com');

    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

    if($mail->send()){
        echo "<script>alert('Mensagem enviada com sucesso!');</script>";
        header("Location: contato.php");
    }else{
        echo 'Mensagem não enviada.';
    }

}catch(Exemption $e){
    echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
}