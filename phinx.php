<?php
return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'mvc',
                'user' => 'root',
                'pass' => 'ee35jeCAMqAgtdC7',
                'port' => '3306',
                'charset' => 'utf8mb4',
            ],
            'development' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'mvc',
                'user' => 'root',
                'pass' => 'ee35jeCAMqAgtdC7',
                'port' => '3306',
                'charset' => 'utf8mb4',
            ],
            'testing' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'mvc',
                'user' => 'root',
                'pass' => 'ee35jeCAMqAgtdC7',
                'port' => '3306',
                'charset' => 'utf8mb4',
            ]
        ],
        'version_order' => 'creation'
    ];
