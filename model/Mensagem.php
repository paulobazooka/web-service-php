<?php
/**
 * Created by PhpStorm.
 * User: bianquezi
 * Date: 25/09/18
 * Time: 10:06
 */

    // Inclui o arquivo class.phpmailer.php localizado na pasta class
  //  require_once "../aux/stmp_mail/class.phpmailer.php";
    require "../aux/stmp_mail/PHPMailerAutoload.php";
  //  require_once "../aux/stmp_mail/class.smtp.php";

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
        $mail = new PHPMailer;
        $mail->isSMTP(true);

        // Define os dados do servidor e tipo de conexão
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
        $mail->Port = 587;
        $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'olhar.cidadao.ifsp@gmail.com'; // Usuário do servidor SMTP
        $mail->Password = 'ifspifsp'; // Senha do servidor SMTP

        $mail->setFrom("olhar.cidadao.ifsp@gmail.com", "Olhar Cidadão");
        $mail->addAddress('TESTE 01');
        $mail->addReplyTo('olhar.cidadao.ifsp@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'PHP TESTE OLHAR CIDADAO';
        $mail->Body = '<h5 align="center">TESTE</h5>';

        if(!$mail->send()){
            echo "Email não foi enviado";
        }else{
            echo "Email enviado com sucesso!";
        }

    }


}