<?php

namespace Kuusamo\Plugin\Smtp\Test;

use Kuusamo\Plugin\Smtp\PHPMailerFactory;
use Kuusamo\Plugin\Smtp\SmtpConfig;
use Kuusamo\Plugin\Smtp\SmtpProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPUnit\Framework\TestCase;

class SmtpProviderTest extends TestCase
{
    public function testSendEmail()
    {
        $configMock = $this->createMock(SmtpConfig::class);
        $configMock->method('offsetGet')->willReturn('string');

        $phpMailer = $this->createMock(PHPMailer::class);

        $factoryMock = $this->createMock(PHPMailerFactory::class);
        $factoryMock->method('create')->willReturn($phpMailer);

        $provider = new SmtpProvider($configMock, $factoryMock);

        $result = $provider->sendEmail(
            'recipient@example.com',
            'Subject',
            'Message'
        );

        $this->assertTrue($result);
    }
}
