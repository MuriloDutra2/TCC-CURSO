<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

// Função para enviar email de confirmação
function enviarEmail($emailDestinatario, $nomeDestinatario, $metodoPagamento, $filme, $assentos, $total) {
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'seu-email@gmail.com';
        $mail->Password   = 'sua-senha-ou-senha-de-aplicativo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remetente e destinatário
        $mail->setFrom('seu-email@gmail.com', 'C-Street Cinema');
        $mail->addAddress($emailDestinatario, $nomeDestinatario);

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Confirmação de Compra - C-Street';
        $mail->Body    = "
            <p>Olá <strong>$nomeDestinatario</strong>,</p>
            <p>Obrigado por sua compra no C-Street!</p>
            <p><strong>Filme:</strong> $filme</p>
            <p><strong>Assentos:</strong> $assentos</p>
            <p><strong>Total a Pagar:</strong> R$ $total</p>
            <p><strong>Método de pagamento escolhido:</strong> $metodoPagamento</p>
            <br>
            <p>Sua compra foi efetuada com sucesso. Aproveite o filme!</p>
            <br>
            <p>C-Street Cinema</p>
        ";

        // Enviar o email
        $mail->send();
        echo 'Email enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
    }
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar e validar os dados do formulário
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $nome = htmlspecialchars($_POST['nome'], ENT_QUOTES, 'UTF-8');
    $metodo = htmlspecialchars($_POST['metodo'], ENT_QUOTES, 'UTF-8');
    $filme = htmlspecialchars($_POST['filme'], ENT_QUOTES, 'UTF-8');
    $assentos = htmlspecialchars($_POST['assentos'], ENT_QUOTES, 'UTF-8');
    $total = htmlspecialchars($_POST['total'], ENT_QUOTES, 'UTF-8');

    // Verificar se o email é válido e se os outros campos não estão vazios
    if ($email && !empty($nome) && !empty($metodo) && !empty($filme) && !empty($assentos) && !empty($total)) {
        // Enviar o email de confirmação
        enviarEmail($email, $nome, $metodo, $filme, $assentos, $total);

        // Exibir mensagem de sucesso (removido o redirecionamento)
        echo '<script>alert("Compra efetuada com sucesso! Confira seu email.");</script>';
    } else {
        // Exibir mensagem de erro caso faltem dados
        echo '<script>alert("Erro: Por favor, preencha todos os campos corretamente."); window.history.back();</script>';
    }
}
?>
