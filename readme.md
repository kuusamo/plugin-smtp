SMTP Plugin
===========

[![Latest Stable Version](https://poser.pugx.org/kuusamo/plugin-smtp/v)](//packagist.org/packages/kuusamo/plugin-smtp)
[![Total Downloads](https://poser.pugx.org/kuusamo/plugin-smtp/downloads)](//packagist.org/packages/kuusamo/plugin-smtp)
[![License](https://poser.pugx.org/kuusamo/plugin-smtp/license)](//packagist.org/packages/kuusamo/plugin-smtp)
[![Build Status](https://app.travis-ci.com/kuusamo/plugin-smtp.svg?branch=master&status=passed)](https://app.travis-ci.com/github/kuusamo/plugin-smtp)

This plugin adds SMTP email integration to Kuusamo.


Installation
------------

Install into your project using Composer.

    composer require kuusamo/plugin-smtp


Usage
-----

Install it in `index.php` of your project.

    $smtpConfig = new Kuusamo\Plugin\Smtp\SmtpConfig([
        'senderAddress' => 'test@example.com',
        'senderName' => 'Kuusamo',
        'senderReplyAddress' => 'reply@example.com', // optional
        'host' => 'smtp.example.com',
        'port' => 25,
        'username' => 'smtp-user',
        'password' => 'smtp-password'
    ]);

    $provider = Kuusamo\Plugin\Smtp\SmtpFactory::create($smtpConfig);
    Kuusamo\Vle\Service\Email\EmailFactory::setProvider($provider);


Development
-----------

Run the tests

    ant
