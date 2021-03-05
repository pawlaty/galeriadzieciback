<?php  defined('SYSPATH') OR die('No direct script access.'); //zmiana

return [
    'default' => [
        'type' => 'MySQLi',
        'connection' => [
            'hostname' => 'localhost',
            'database' => 'pawlaty_galeriadzieci',
            'username' => 'pawlaty_tata',
            'password' => '5ah0I3vJ}{{O)I{I))I)O}OIKJSJADF{SI',
            'persistent' => false,
        ],
        /**
         * The following extra options are available for PDO:
         *
         * string   identifier  Set the escaping identifier
         */
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => false,
    ],
    'mysqli' => [
        'type' => 'MySQLi',
        'connection' => [
            'hostname' => 'localhost',
            'database' => 'pawlaty_galeriadzieci',
            'username' => 'pawlaty_tata',
            'password' => '5ah0I3vJ}{{O)I{I))I)O}OIKJSJADF{SI',
            'persistent' => false,
            'ssl' => null,
        ],
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => false,
    ],
];
