<?php defined('SYSPATH') OR die('No direct script access.');//change

return [
    'database' => [
        /**
         * Database settings for session storage.
         *
         * string   group  configuation group name
         * string   table  session table name
         * integer  gc     number of requests before gc is invoked
         * columns  array  custom column names
         */
        'group' => 'default',
        'table' => 'sessions',
        'gc' => 500,
		'lifetime' => 43200,/*add change*/
        'columns' => [
            /**
             * session_id:  session identifier
             * last_active: timestamp of the last activity
             * contents:    serialized session data
             */
			'session_id' => 'session_id',
            'last_active' => 'last_active',
            'contents' => 'contents'
        ],
    ],
];
/*
return array(
    'native' => array(
        'name' => 'session_name',
        'lifetime' => 43200,
    ),
    'cookie' => array(
        'name' => 'cookie_name',
        'encrypted' => TRUE,
        'lifetime' => 43200,
    ), 
    'database' => array(
        'name' => 'cookie_name',
        'encrypted' => TRUE,
        'lifetime' => 43200,
        'group' => 'default',
        'table' => 'sessions',
		'gc' => 500,
        'columns' => array(
            'session_id'  => 'session_id',
    		'last_active' => 'last_active',
    		'contents'    => 'contents'
        ),
        
    ),
);*/