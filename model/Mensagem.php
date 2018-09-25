<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 25/09/18
 * Time: 10:06
 */

    // Inclui o arquivo class.phpmailer.php localizado na pasta class
    include_once "../aux/PHPMailer-6.0.5/src/PHPMailer.php";

class Mensagem
{

    private $mensagem;
    private $titulo;
    private $remetente;

    public function __construct($mensagem, $rementente, $titulo)
    {
        $this->mensagem = $mensagem;
        $this->remetente = $rementente;
        $this->titulo = $titulo;
    }


    public function enviarMensagem()
    {
        // Inicia a classe PHPMailer
        $mail = new PHPMailer(true);
        // Define os dados do servidor e tipo de conexão
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(true); // Define que a mensagem será SMTP
        $mail->SMTPDebug  = 1;
        $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
        $mail->Port = 587;
        $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
        $mail->SMTPSecure = 'ssl';
        $mail->Username = 'olhar.cidadao.ifsp@gmail.com'; // Usuário do servidor SMTP
        $mail->Password = 'ifspifsp'; // Senha do servidor SMTP
        // Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From = "olhar.cidadao.ifsp@gmail.com"; // Seu e-mail
        $mail->FromName = "Olhar Cidadão"; // Seu nome
        // Define os destinatário(s)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress('olhar.cidadao.ifsp@gmail.com', 'Teste');
        // Define os dados técnicos da Mensagem
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        // Define a mensagem (Texto e Assunto)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->Subject  = "Mensagem Teste"; // Assunto da mensagem
        $mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>!  :)";
        $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
        // Define os anexos (opcional)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
        // Envia o e-mail
        $enviado = $mail->Send();
        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();
        // Exibe uma mensagem de resultado
        if ($enviado) {
            echo "E-mail enviado com sucesso!";
        }
        else {
            echo "Não foi possível enviar o e-mail.";
            echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
        }
    }


}