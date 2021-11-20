<?php

namespace Kuusamo\Plugin\Smtp\Test;

use Kuusamo\Plugin\Smtp\PHPMailerFactory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPUnit\Framework\TestCase;

class PHPMailerFactoryTest extends TestCase
{
    public function testCreate()
    {
        $factory = new PHPMailerFactory;
        $this->assertInstanceOf(PHPMailer::class, $factory->create());
    }
}