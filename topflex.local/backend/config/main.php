<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use \yii\web\Request;
$adminUrl = str_replace('/backend/web', '/admin', (new Request)->getBaseUrl());
return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'users-admin',
    ],
    'modules' => [
        // ID модуля может быть любой.
        'users-admin' => [
            'class' => 'mdm\admin\Module',
            // Отключаем шаблон модуля,
            // используем шаблон нашей админки.
            'layout' => null,
        ],
        // ID модуля должен обязательно быть "user", иначе модуль не загрузится.
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['MegaAdmin'], // Хардкод для админского пользователя. После настройки прав доступа, нужно удалить эту строку.
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
/*
        'urlManager' => [
//            'baseUrl' => $adminUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                '' => 'site/index',
//                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],*/

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                '' => 'site/index',


                '<action>'=>'site/<action>',
            ],
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
//        'request' => [
//            'baseUrl' => '/admin'
//        ]

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
//        'class' => 'mdm\admin\classes\AccessControl',
        // Маршруты, открытые по умолчанию всегда.
        // Открываем только для начальной разработки.
        // Как только основные данные о ролях заполнены,
        // убираем отсюда всё лишнее.
        'allowActions' => [
            // Маршруты модуля пользователей.
            // Логин и так разрешён, но разлогиниться
            // без этой настройки и без настроенных ролей не получится.
            'user/*',
            'site/*',
            'users-admin/*',
            'debug/*',
        ]
    ],
    'params' => $params,
];
