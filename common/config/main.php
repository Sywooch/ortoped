<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
	'modules' => [
		'i18n'
	],
	
	'components' => [
        'db' => require(__DIR__.'/db.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
		    'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
             'enablePrettyUrl' => true,
            'rules' => [
                /*
                 * //'<id:(about|terms-use|contact)>' => 'site/site-page',
                '<action:go>' => 'site/go', //
                '<id:contact>' => 'site/site-page', // 
                '<id:(about|terms-use)>' => 'site/post', // ��� ����
                'sendemailpost/<id:\d+>/<user_id:\d+>' => 'site/sendemailpost',

                '<action:(index|news|login|logout|signup|request-password-reset|reset-password|choice-day|announcement|style|practice|shopping|image-maker|beauty|lifeStyle|life-style|post|search|cite)>' => 'site/<action>',

				//'<action:(news|choice-day|announcement|style|practice|shopping|image-maker|beauty|lifeStyle|life-style|post|search)>/<tag:(travels|culture|restourant|interier|svetskaya-jizn|otels|texnika|news|health|makiyaj|uxod|parfume|preview)>/<id>' => 'site/post',
				'<action:(news|choice-day|announcement|style|practice|shopping|image-maker|beauty|lifeStyle|life-style|post|search|cite)>/<tag:[\w_\/-]+>/<id>' => 'site/post',
				'<action:(news|choice-day|announcement|style|practice|shopping|image-maker|beauty|lifeStyle|life-style|post|search|cite)>/<id>' => 'site/post',
				*/
                //'<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/download/<file:\w+>' => '<controller>/download',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',

            ],
        ],	
        'i18n' => [
			'translations' => [
				'app*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@common/messages',
					'fileMap' => [
						'app' => 'app.php'
					],
				],
			],
		],
	],
];
