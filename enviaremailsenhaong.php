<?php
include('config.php');
$email = $_POST["email"];

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$novasenha = substr(md5(time()), 0, 6);
$sql = "UPDATE ong SET senha = '$novasenha' WHERE email = '$email'";

try {
    $mail->isSMTP();
    $mail->Host = "smtp-relay.brevo.com";
    $mail->SMTPAuth = true;
    $mail->Username = "amalocao@gmail.com";
    $mail->Password = "W39xhFG8svPZX4mL";
    $mail->Port = 587;

    $mail->setFrom($email);
    $mail->addAddress('amalocao@gmail.com');

    $mail->Subject = "Recuperacao de senha";
    $mail->Body = "Sua nova senha: " . $novasenha;

    if ($mail->send()) {

        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "<script>alert('Mensagem enviada com sucesso!');</script>";
            echo "<script>setTimeout(function() { window.location = 'loginong.php'; }, 200);</script>";
        } else {
            echo "<script>alert('Erro ao atualizar a senha no banco de dados.');</script>";
        }
    } else {
        echo "<script>alert('Mensagem não enviada.');</script>";
    }

} catch (Exception $e) {
    echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
}
?>
