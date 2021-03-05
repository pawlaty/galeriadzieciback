<?php

return [
    'default' => [
        'type' => 'MySQLI',
        'connection' => [
            'hostname' => 'localhost',
            'database' => 'galeria_kohana',
            'username' => 'kohna_admin',
            'password' => '&H*&EGF5423*42EGFE23&(F323E&EY&EGF&UOE&(W#*',
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
            'database' => 'galeria_kohnana',
            'username' => 'kohna_admin',
            'password' => '&H*&EGF5423*42EGFE23&(F323E&EY&EGF&UOE&(W#*',
            'persistent' => false,
            'ssl' => null,
        ],
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => false,
    ],
];
