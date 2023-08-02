<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;



class email {
public $nombre;
public $email;
public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion() {

        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('sistema@dguerra.mx');
        $mail->addAddress('sistema@dguerra.mx', 'dguerra.mx');
        $mail->Subject = 'Confirma tu cuenta';

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Appsalon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token=". $this->token ."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();

    }

    public function enviarInstrucciones() {
                //Crear el objeto de email
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '8b56957a41e021';
                $mail->Password = '7ec6265bc77f2c';
        
                $mail->setFrom('sistema@dguerra.mx');
                $mail->addAddress('sistema@dguerra.mx', 'dguerra.mx');
                $mail->Subject = 'Reestablece tu password';
        
                //Set HTML
                $mail->isHTML(TRUE);
                $mail->CharSet = 'UTF-8';
        
                $contenido = "<html>";
                $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
                $contenido .= "<p>Presiona aqui: <a href='" . $_ENV['APP_URL'] . "/recuperar?token=". $this->token ."'>Reestablecer Password</a></p>";
                $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
                $contenido .= "</html>";
        
                $mail->Body = $contenido;
        
                //Enviar el mail
                $mail->send();
    }
}
