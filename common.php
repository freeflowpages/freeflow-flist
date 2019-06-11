<?php
/**
 * This file provides to overwrite the default HumHub / Yii configuration by your local common (Console and Web) environments
 * @see http://www.yiiframework.com/doc-2.0/guide-concept-configurations.html
 * @see http://docs.humhub.org/admin-installation-configuration.html
 * @see http://docs.humhub.org/dev-environment.html
 */
return [
    'components' => [
	'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'authClientCollection' => [
            'clients' => [
                'itsyouonline' => [
                    'class' => 'humhub\modules\user\authclient\IYO',
                    'clientId' => getenv('CLIENT_ID'),
                    'clientSecret' => getenv('CLIENT_SECRET'),
	    ],
	        '3bot' => [
                    'class' => 'humhub\modules\threebot_login\authclient\ThreebotAuth',
                    'clientId' => '3bot',
                    'keyPair' => getenv('THREEBOT_KEY_PAIR'),

                ],
            ],
    ],
    
    'urlManager' => [
             'showScriptName' => false,
             'enablePrettyUrl' => true,
	     'rules' => [
                '/user/registration' => '/user/auth/login'
             ]
         ],
   ],
 	'params' => [
             'hidePoweredBy' => true
    ]

];
