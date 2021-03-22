<?php
return [
    'name' => 'RCK CMS',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'recruitment' => [
            'class' => 'common\Library\Recruitment'
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => ['/plugins/jquery/jquery.js'],
                ]
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['api/client']
                ]
            ],
        ],
        
    ],
    // Declare modules outside components arrray
    'modules' => [
        'api' => [
            'class' => \common\modules\api\Module::class
        ]
    ]
];
