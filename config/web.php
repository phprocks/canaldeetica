<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'canaldeetica',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'pt-BR',
    'sourceLanguage' => 'en-US',      
    'components' => [
        'request' => [
            'cookieValidationKey' => 'canaldeeticaHOSkpcS0ihF5LSodrr3HNb1AaqZd32Pv',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
        'view' => [
                'theme' => [
                    'pathMap' => [
                        '@vendor/amnah/yii2-user/views/default' => '@app/views/user',
                    ],
                ],
            ],         
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'viewPath' => '@common/mail',
        //     'useFileTransport' => false,
        //     'transport' => [
        //             'class' => 'Swift_MailTransport',
        //         ],
        //     'messageConfig' => [
        //         'from' => ['admin@website.com' => Yii::$app->params['appName']],
        //         'charset' => 'UTF-8',
        //     ]
        // ],
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' => 'gugoan@gmail.com',
                    'password' => 'Metal1984',
                    'port' => '587',
                    'encryption' => 'tls',
                ],
            ],       
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'user' => [
            'class' => 'amnah\yii2\user\Module',
            // set custom module properties here ...
            'controllerMap' => [
                'default' => 'app\controllers\DefaultController',
            ],           
        ],
       'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
