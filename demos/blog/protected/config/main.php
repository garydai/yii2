<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'后台管理系统',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.Admin.models.*',
		'application.modules.Admin.components.*',
		
	),

	'modules' => array(



                'gii'=>array(
                        'class'=>'system.gii.GiiModule',
                        'password'=>'123456',
                        'ipFilters'=>array('115.236.45.142', '115.198.203.87', '125.118.0.146', '122.235.191.111'),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
	        ),
		
		'Admin',//=>array(


            // enable cookie-based authentication
           	//	 'class'=>'AdminUsers',
          	 //	 'stateKeyPrefix'=>'admin',//设置后台session前缀
           	//	 'allowAutoLogin'=>false,
         	  //	 'loginUrl' =>array('/admin/adminuser/login'),
        	//	),

	
	),
	'defaultController'=>'post',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
		),



       'admin'=>array(
            // enable cookie-based authentication
            'class'=>'AdminUsers',
            'stateKeyPrefix'=>'admin',//设置后台session前缀
            'allowAutoLogin'=>false,
           'loginUrl' =>array('/Admin/adminuser/login'),
        ),


	


//	        'admin'=>array(
            // enable cookie-based authentication
  //      	    'class'=>'AdminUsers',
//	            'stateKeyPrefix'=>'admin',//设置后台session前缀
  //      	    'allowAutoLogin'=>false,
//	            'loginUrl' =>array('/admin/adminuser/login'),
  //      	),



//		'db'=>array(
//			'connectionString' => 'sqlite:protected/data/blog.db',
//			'tablePrefix' => 'tbl_',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=route',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(


				 'gii'=>'gii',
		        	    'gii/<controller:\w+>'=>'gii/<controller>',
	        		    'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				'post/<id:\d+>/<title:.*?>' => 'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
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
