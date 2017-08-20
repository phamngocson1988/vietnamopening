<?php
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    require(__DIR__ . '/test.php'),
    [
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=localhost;dbname=yii2advanced_test',
            ]
        ],

        'bootstrap' => ['debug'],
        'modules' => [
            'debug' => [
                'class' => 'yii\debug\Module',
                // uncomment and adjust the following to add your IP if you are not connecting from localhost.
                //'allowedIPs' => ['127.0.0.1', '::1'],
            ],
        ],
    ]
);
