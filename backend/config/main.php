<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'language'=>'zh-CN',
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'authManager'=>[
               'class'=>'yii\rbac\DbManager',
                // auth_item (role permission)
            // auth_item_child (role->permission)
            // auth_assignment (user->role)
            // auth_rule (rule)
            'itemTable' => '{{%auth_item}}',
            'itemChildTable' => '{{%auth_item_child}}',
            'assignmentTable' => '{{%auth_assignment}}',
            'ruleTable' => '{{%auth_rule}}',
            'defaultRoles' => ['default'],
            ],
        'request' => [
            
            'csrfParam' => '_csrf-backend',
           'parsers' => [
                //'application/json' => 'yii\web\JsonParser',
               // 'text/json' => 'yii\web\JsonParser',
 ]
        ],
        'i18n' => [
            'translations' => [
                'common' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                    ],
                ],
                'power' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '/messages',
                    'fileMap' => [
                        'power' => 'power.php',
                    ],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\AdminModel', //链接user组件的实例
            //'identityClass' => 'backend\models\Admin',
            'enableAutoLogin'=>true,
            // 'idParam' => '__user',
             'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
             'loginUrl' => ['/site/login'],
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];


