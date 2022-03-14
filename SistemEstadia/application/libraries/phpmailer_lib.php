<?php
class phpmailer_lib
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        require_once('../lib/phpmailer/PHPMailer.php');
        require_once('../lib/phpmailer/SMTP.php');

        $objMail = new PHPMailer\PHPMailer\PHPMailer();
        return $objMail;
    }
}