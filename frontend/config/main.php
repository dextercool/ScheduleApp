<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',    
    //'catchAll' => ['site/offline'], // to catch all if application is maintane
    'modules' => [
        'admin' => [
            'layout' => 'left-menu', // default null. other avaliable value 'right-menu'
            'class' => 'mdm\admin\Module',
        ],
        'sirsys' => [
            'class' => 'dxapp\sirsys\Module'
        ]
//        'master' => [
//            'class' => 'dxapp\sirsys\master\Module',
//            'modules'=> [
//                'staff' => 'dxapp\sirsys\master\staff\Module',
//                'stafftype' => 'dxapp\sirsys\master\staffType\Module',
//                'student' =>  'dxapp\sirsys\master\student\Module',
//                'studytype' => 'dxapp\sirsys\master\studyType\Module',
//                'activity' => 'dxapp\sirsys\master\activity\Module'
//            ]
//        ],
//        'schedule' => [
//            'class' => 'dxapp\sirsys\schedule\Module',
//        ],
//        'studentrecord' => [
//            'class' => 'dxapp\sirsys\studentRecord\Module',
//        ]
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=Schedule',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'suffix' => '.html',
            'rules' => array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ],
        'authManager' => [
			'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
		]
    ],
    //'as access' => [
    //    'class' => 'mdm\admin\components\AccessControl',
    //    'allowActions' => [
    //        'admin/*', // add or remove allowed actions to this list
    //    ]
    //],
    'params' => $params,
];
