<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../lib/vendor/autoload.php';

header('Content-Type: text/html; charset=utf-8'); 

$nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8') : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
$metodo = isset($_POST['metodo']) ? htmlspecialchars($_POST['metodo'], ENT_QUOTES, 'UTF-8') : '';
$assentos = isset($_POST['assentos']) ? htmlspecialchars($_POST['assentos'], ENT_QUOTES, 'UTF-8') : '';
$filme = isset($_POST['filme']) ? htmlspecialchars($_POST['filme'], ENT_QUOTES, 'UTF-8') : '';
$total = isset($_POST['total']) ? htmlspecialchars($_POST['total'], ENT_QUOTES, 'UTF-8') : '';

$mail = new PHPMailer(true);
try {
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = '095e9be687dbef';
    $mail->Password   = 'd47d2a91afc6af';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('murilo@teste.com.br', 'Murilo');
    $mail->addAddress($email, $nome);

    $mail->isHTML(true);
    $mail->Subject = 'Confirmação de Compra - C-Street';
    $mail->Body    = "
        <p>Olá <strong>$nome</strong>,</p>
        <p>Obrigado por sua compra no C-Street!</p>
        <p><strong>Filme:</strong> $filme</p>
        <p><strong>Assentos:</strong> $assentos</p>
        <p><strong>Total a Pagar:</strong> R$ $total</p>
        <p><strong>Método de pagamento escolhido:</strong> $metodo</p>
        <br>
        <p>Sua compra foi efetuada com sucesso. Aproveite o filme!</p>
        <br>
        <p>C-Street Cinema</p>
    ";

    $mail->send();
    echo 'Email enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar o email: {$mail->ErrorInfo}";
}
