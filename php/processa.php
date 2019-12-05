<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "rcetiquetasmetalicas@gmail.com");
        $subject = "Mensagem de Contato do Site";
        $to = new SendGrid\Email(null, "rcetiquetasmetalicas@gmail.com");
        $content = new SendGrid\Content("text/html", "Novo contato <br><br>Dados do cliente:<br><br>Nome: $nome<br><br>Email: $email <br><br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
        ?>
    </body>
</html>
