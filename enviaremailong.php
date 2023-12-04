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

try {
    $mail->isSMTP();
    $mail->Host = "smtp-relay.brevo.com";
    $mail->SMTPAuth = true;
    $mail->Username = "amalocao@gmail.com";
    $mail->Password = "W39xhFG8svPZX4mL";
    $mail->Port = 587;

    $mail->setFrom($email, $nome);
    $mail->addAddress('amalocao@gmail.com');

    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

if ($mail->send()) {
    echo "<script>alert('Mensagem enviada com sucesso!');</script>";
    echo "<script>setTimeout(function() { window.location = 'adote.php'; }, 200);</script>";

    } else {
        echo 'Mensagem não enviada.';
    }
} catch (Exception $e) {
    echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
}
