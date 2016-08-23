<?php 
$config = [
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,

           'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' =>  'ssl://smtp.yandex.ru',  //'mail.fashion-megapolis.com',
                'username' => 'info@fashion-megapolis.com',
                'password' => 'QWERTY1',
                'port' => '465',

                //'encryption' => 'tls'
                ],
            /*'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' =>  'smtp.gmail.com',  //'mail.fashion-megapolis.com',
                'username' => 'clushrustam@gmail.com',
                'password' => 'QWERTYasd123',
                'port' => '587',

                'encryption' => 'tls',
            ],*/

        ],
    ],
];

if (!YII_ENV_TEST) {

    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '178.93.150.148', '94.158.57.173'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '178.93.150.148', '94.158.57.173'],
    ];
}

return $config;
