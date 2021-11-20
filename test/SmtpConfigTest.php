<?php

namespace Kuusamo\Plugin\Smtp\Test;

use Kuusamo\Plugin\Smtp\SmtpConfig;
use Kuusamo\Plugin\Smtp\Exception\ConfigException;
use PHPUnit\Framework\TestCase;

class SmtpConfigTest extends TestCase
{
    public function testValid()
    {
        $config = new SmtpConfig([
            'senderAddress' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'host' => 'smtp.example.com',
            'port' => 25,
            'username' => 'user',
            'password' => 'pass'
        ]);

        $this->assertInstanceOf(SmtpConfig::class, $config);
    }

    public function testInvalidOption()
    {
        $this->expectException(ConfigException::class);

        $config = new SmtpConfig([
            'senderAddress' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'host' => 'smtp.example.com',
            'port' => 25,
            'username' => 'user',
            'password' => 'pass',
            'invalid_config_option' => 'kuusamo.org'
        ]);
    }

    public function testMissingOption()
    {
        $this->expectException(ConfigException::class);

        $config = new SmtpConfig([
            'senderAddress' => 'test@example.com',
            'senderName' => 'Kuusamo',
            'host' => 'smtp.example.com',
            'port' => 25
        ]);
    }
}
