
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../lib/vendor/autoload.php';

$mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Ativar saída de depuração
        $mail->isSMTP();                                      // Usar SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';       // Servidor SMTP
        $mail->SMTPAuth   = true;                             // Autenticação SMTP
        $mail->Username   = '095e9be687dbef';                 // Usuário SMTP
        $mail->Password   = 'd47d2a91afc6af';                   // Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilitar criptografia TLS
        $mail->Port       = 587;                             // Porta TCP do Mailtrap

       
        $mail->setFrom('murilo@teste.com.br', 'Murilo');
        $mail->addAddress('dutra@teste.com.br', 'Dutra');     // Destinatário


        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Confirmação de Compra - C-Street';
        $mail->Body    = "
            <b>teste<b>
        ";

        // Enviar o email
        $mail->send();
        echo 'Email enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
    }


// Verificar se o formulário foi enviado
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
//}*/
?>
