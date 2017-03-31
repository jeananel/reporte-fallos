<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//        ],
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
                        //'class' => 'dektrium\user\Module',
                        // restrict access to recovery and registration controllers from backend
                        //'as backend' => 'cinghie\yii2userextended\filters\BackendFilter',
                        // Settings
                        //'enableRegistration' => false,
                        //'enableConfirmation' => true,
                        //'controllers' => [!'profile', !'recovery', !'settings', !'admin'],
                        //'admins' => ['superadmin'],
                        'class' => 'dektrium\user\Module',
                        'enableUnconfirmedLogin' => true,
                        'confirmWithin' => 21600,
                        'cost' => 12,
                        'admins' => ['admin']                       
                    ],      
            //        'user' => [
            //            // following line will restrict access to admin controller from frontend application
            //            'as backend' => 'dektrium\user\filters\BackendFilter',
            //            'controllers' => ['profile', !'recovery', !'settings', !'admin'],
            //            'admins' => ['superadmin'],
            //            'enableRegistration' => false,
            //            'enableConfirmation' => false,
            //           
            //        ],
                        'rbac' => 'dektrium\rbac\RbacWebModule',

    ],    
];
