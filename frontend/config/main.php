<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
//        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
    'modules' => [
                'user' => [
            'class' => 'dektrium\user\Module',
            // restrict access to recovery and registration controllers from backend

            // Settings
            'enableRegistration' => true,
            'enableConfirmation' => true,
        ],
//        'user' => [
//            // following line will restrict access to admin controller from frontend application
//            'as frontend' => 'dektrium\user\filters\FrontendFilter',
//            // ----> Sin ! se le quitan todos los permisos 
//            'controllers' => ['profile', !'recovery', !'settings'],
//            'admins' => ['superadmin'],
//            'enableRegistration' => true,
//            'enableConfirmation' => true,
//        ],
//        'rbac' => [
//            'class' => 'dektrium\rbac\Module',
//            'adminPermission' => ['superadmin'],
//        ],
    ],
];
