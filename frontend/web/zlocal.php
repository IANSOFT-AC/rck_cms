<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname='.env('DB_NAME'),
            'username' => 'root',
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.softeboard.com',
                'username' => 'rck.support@softeboard.com',//'cms_support@rckkenya.org',
                'password' => '@Rck2021#*',//'.2W4r6y9o',
                'port' => '587',
                /*'encryption' => 'tls',
                'streamOptions' => [ 'ssl' =>
                    [
                        'allow_self_signed' => true,
                        'verify_peer' => true,
                        'verify_peer_name' => true,
                    ],
                ],*/
            ],
        ],
    ],
];
