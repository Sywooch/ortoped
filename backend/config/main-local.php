<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'h-czRM51as-63gD7wArn7fqziR1U3xk9',
        ],
    ],
    // 'controllerMap' => [
    //     'elfinder' => [
    //         'class' => 'mihaildev\elfinder\PathController',
    //         'access' => ['@'],
    //         'root' => [
    //             'baseUrl'=>'@web',
    //             'basePath'=>'@webroot',
    //             'path' => '@webroot/uploads/global',
    //             'name' => 'Global'
    //         ],
    //     ]
    // ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'], 
    ];
}

return $config;
