 # Multiple database connections in Laravel to migrate data
Create multiple MySQL database connections in Laravel 10 to migrate data. Select data from one database and insert it into another database for data migration. In this case data of "customers" table from source db to be migrated to "users" and "user_profiles" table in destination db. Tutorial - https://codehow2.com/laravel/how-to-use-multiple-database-connections-in-laravel

# How To Use
1) Create a MySQL database from which you want to extract data. For this example, I used "db_old" as my source database. 
2) Create a table in the above database and populate some test data in it. For this project I used "customers" table. So this will be my source table.
3) Above two steps are done outside my Laravel project
4) Now, download the repository from https://github.com/sundarsau/lara_multiple_db
5) Extract it into a folder
6) Create a Database in MySQL for this Laravel project. This will be the destination database. I called this as "db_new".
7) Open app/config/database.php, just verify that connection "mysql_2" is defined. There are two mysql connections, one is default 'mysql' and other is 'mysql_2'.
 # database connection definitions in app/config/database.php
     'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql_2' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_2', '127.0.0.1'),
            'port' => env('DB_PORT_2', '3306'),
            'database' => env('DB_DATABASE_2', 'forge'),
            'username' => env('DB_USERNAME_2', 'forge'),
            'password' => env('DB_PASSWORD_2', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
8) copy .env.example to .env and update database details for both the connections. host, port, database, username and password:
 # default database connection
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_new
    DB_USERNAME=root
    DB_PASSWORD=

    
 # second connection to connect to old database for data migration
    DB_CONNECTION_2=mysql
    DB_HOST_2=127.0.0.1
    DB_PORT_2=3306
    DB_DATABASE_2=db_old
    DB_USERNAME_2=root
    DB_PASSWORD_2=

9) Run composer install from project root
10) Run php artisan key:generate
11) Run php artisan migrate. This will create Laravel default tables and also creates a new table named "user_profiles". 
12) Data from "customers" table to be migrated to "users" and "user_profiles" table in "db_new" database.
13) Run php artisan serve
14) In Browser run localhost:8000, click on "Migrate Customer Data" button

# License
This is an MIT license, you can modify the code according to your requirements
