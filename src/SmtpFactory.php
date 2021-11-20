<?php

namespace Kuusamo\Plugin\Smtp;

class SmtpFactory
{
    /**
     * Create an instance of the provider.
     *
     * @param SmtpConfig $config Config.
     * @return MailgunProvider
     */
    public static function create(SmtpConfig $config): SmtpProvider
    {
        $phpMailerFactory = new PHPMailerFactory;
        return new SmtpProvider($config, $phpMailerFactory);
    }
}
