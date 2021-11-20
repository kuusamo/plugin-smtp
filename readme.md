SMTP Plugin
===========

This plugin adds SMTP email integration to Kuusamo.


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
