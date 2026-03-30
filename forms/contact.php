<?php
// 1. Defina o e-mail que vai receber as mensagens
$receiving_email_address = 'jekarllos@gmail.com';

// 2. Coleta os dados do formulário
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// 3. Validação básica
if(empty($name) || empty($email) || empty($message)) {
    die('Por favor, preencha todos os campos obrigatórios.');
}

// 4. Monta o corpo do e-mail
$email_content = "Nome: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Assunto: $subject\n\n";
$email_content .= "Mensagem:\n$message\n";

// 5. Cabeçalhos do e-mail (importante para não cair no spam)
$headers = "From: $name <$receiving_email_address>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// 6. Envia o e-mail
if(mail($receiving_email_address, "Contato Portfólio: $subject", $email_content, $headers)) {
    echo "OK"; // O validate.js espera "OK" para exibir a mensagem de sucesso
} else {
    echo "Erro ao enviar o e-mail. Tente novamente mais tarde.";
}
?>