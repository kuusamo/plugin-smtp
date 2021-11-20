<?php

namespace Kuusamo\Plugin\Smtp\Test;

use Kuusamo\Plugin\Smtp\SmtpConfig;
use Kuusamo\Plugin\Smtp\SmtpFactory;
use Kuusamo\Plugin\Smtp\SmtpProvider;
use PHPUnit\Framework\TestCase;

class SmtpFactoryTest extends TestCase
{
    public function testCreate()
    {
        $configMock = $this->createMock(SmtpConfig::class);
        $configMock->method('offsetGet')->willReturn('string');

        $provider = SmtpFactory::create($configMock);

        $this->assertInstanceOf(SmtpProvider::class, $provider);
    }
}