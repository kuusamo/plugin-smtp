<?php

namespace Kuusamo\Plugin\Smtp;

use Kuusamo\Vle\Service\Email\Provider\ProviderInterface;

class SmtpProvider implements ProviderInterface
{
    /**
     * Configuration.
     *
     * @var SmtpConfig
     */
    private $config;

    /**
     * PHPMailer factory.
     *
     * @var PHPMailerFactory
     */
    private $factory;

    /**
     * Create a Mailgun object.
     *
     * @param MailgunConfig $config Configuration object.
     */
    public function __construct(SmtpConfig $config, PHPMailerFactory $factory)
    {
        $this->config = $config;
        $this->factory = $factory;
    }

    /**
     * Send an email.
     *
     * @param string $recipient Recipent address.
     * @param string $subject   Subject.
     * @param string $message   Message body.
     * @return boolean
     */
    public function sendEmail(string $recipient, string $subject, string $message): bool
    {
        $mail = $this->factory->create();
        $mail->isSMTP();
        $mail->Host = $this->config['host'];
        $mail->Port = $this->config['port'];
        $mail->SMTPAuth = true;
        $mail->Username = $this->config['username'];
        $mail->Password = $this->config['password'];

        $mail->setFrom(
            $this->config['senderAddress'],
            $this->config['senderName']
        );

        if (isset($this->config['senderReplyAddress'])) {
            $mail->addReplyTo($this->config['senderReplyAddress']);
        }

        $mail->addAddress($recipient);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true;
    }
}
