<?php

namespace Kuusamo\Plugin\Smtp;

use PHPMailer\PHPMailer\PHPMailer;

class PHPMailerFactory
{
    /**
     * Create an instance of the the PHPMailer email object.
     *
     * @return PHPMailer
     */
    public function create(): PHPMailer
    {
        return new PHPMailer(true);
    }
}
