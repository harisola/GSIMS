<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            
        ],

        'mysql_gsEvents' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_GSEVENTS', '127.0.0.1'),
            'port' => env('DB_PORT_GSEVENTS', '3306'),
            'database' => env('DB_DATABASE_GSEVENTS', 'forge'),
            'username' => env('DB_USERNAME_GSEVENTS', 'forge'),
            'password' => env('DB_PASSWORD_GSEVENTS', ''),
            'unix_socket' => env('DB_SOCKET_GSEVENTS', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],
		
		'mysql_att_lo' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => 'atif_attendance',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],
		
		'mysql_gs_events' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => 'atif_gs_events',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],
		
		'Badge_DB' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => 'gs_badges',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],
		
		'default_Atif' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => 'atif',
            'username' => 'root',
            'password' => 'abc',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],
	
		
		'mysql_StudentLog' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => 'atif_student_log',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],


        'mysql_Career_fee_bill' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_Career_FB', '127.0.0.1'),
            'database' => env('DB_DATABASE_Career_FB', ''),
            'username' => env('DB_USERNAME_Career_FB', ''),
            'password' => env('DB_PASSWORD_Career_FB', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],


        'mysql_Career' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_Career', '127.0.0.1'),
            'database' => env('DB_DATABASE_Career', 'forge'),
            'username' => env('DB_USERNAME_Career', 'forge'),
            'password' => env('DB_PASSWORD_Career', 'forge'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],

        'mysql_Career_fee' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_fee', '127.0.0.1'),
            'database' => env('DB_DATABASE_fee', 'forge'),
            'username' => env('DB_USERNAME_fee', 'forge'),
            'password' => env('DB_PASSWORD_fee', 'forge'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],

        'mysql_AttendanceStaff' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_AttendanceStaff', '127.0.0.1'),
            'database' => env('DB_DATABASE_AttendanceStaff', 'forge'),
            'username' => env('DB_USERNAME_AttendanceStaff', 'forge'),
            'password' => env('DB_PASSWORD_AttendanceStaff', 'forge'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],


        'mysql_Attendance' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_Attendance', '127.0.0.1'),
            'database' => env('DB_DATABASE_Attendance', 'forge'),
            'username' => env('DB_USERNAME_Attendance', 'forge'),
            'password' => env('DB_PASSWORD_Attendance', 'forge'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],

        'mysql_Visitor' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_Attendance', '127.0.0.1'),
            'database' => env('DB_DATABASE_Visitor', 'forge'),
            'username' => env('DB_USERNAME_Visitor', 'forge'),
            'password' => env('DB_PASSWORD_Visitor', 'forge'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],

        'my_VechilesDB' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_fee', '127.0.0.1'),
            'database' => env('DB_DATABASE_Vehicle', 'forge'),
            'username' => env('DB_USERNAME_Vehicle', 'forge'),
            'password' => env('DB_PASSWORD_Vehicle', 'forge'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options'   => [PDO::ATTR_EMULATE_PREPARES => true,],
        ],


        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
