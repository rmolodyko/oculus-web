<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
//Путь к подключению пакетов
$packages = require_once(dirname(__FILE__).'/packages.php');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Oculus Rift',

	// preloading 'log' component
	'preload'=>array('log'),

    'aliases' => array(
        'gchart' => realpath(__DIR__ . '/../extensions/gchart'), // change this if necessary
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.models.db.*',
		'application.components.*',
        'bootstrap.helpers.TbHtml',
        'gchart.*',
	),

	'defaultController'=>'post',
    'modules' => array(
//            'gii' => array(
//            'generatorPaths' => array('bootstrap.gii'),
//        ),
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'admin',
            'ipFilters'=>array('127.0.0.1','77.47.220.130'),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
        ),
        'remote',
        'operate',
        'analytics',
    ),
	// application components
	'components'=>array(
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
        'clientScript'=>array(
            'packages'=>$packages,
        ),        /*
		'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
        */
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=ef907db.mirohost.net;dbname=oculus',
			'emulatePrepare' => true,
			'username' => 'u_oculusz',
			'password' => 'tfmQSsNU',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
        /*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
        */
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);