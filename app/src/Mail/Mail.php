<?php namespace Mail;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    static public function sendCode($email, $code)
    {
        $mail = new PHPMailer;
        $mail->setFrom('SuperMegaDev@gmail.com', 'Auto');
        $mail->addAddress($email, 'My Friend');
        $mail->Subject  = 'It is your code';
        $mail->Body     = $code;
        if(!$mail->send()) {
            return false;
        }
        return true;
    }
}