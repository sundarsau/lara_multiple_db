 # Multiple database connections in Laravel
Create multiple MySQL database connections in Laravel 10 to migrate data. Select data from one database and insert it into another database for data migration. In this case data of "customers" table from source db to be migrated to "users" and "user_profiles" table in destination db.

# How To Use
1) Create a MySQL database from which you want to extract data. For this example, I used "db_old" as my source database. 
2) Create a table in the above database and populate some test data in it. For this project I used "customers" table. So this will be my source table.
3) Above two steps are done outside my Laravel project
4) Now, download the repository from https://github.com/sundarsau/lara_multiple_db
6) Extract it into a folder
5) Create a Database in MySQL for this Laravel project. This will be the destination database. I called this as "db_new".
6) Open app/config/database.php, just verify that connection "mysql_2" is defined. There are two mysql connections, one is default 'mysql' and other is 'mysql_2'.
7) copy .env.example to .env and update database details for both the connections. host, port, database, username and password   
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

8) Run composer install from project root
9) Run php artisan key:generate
10) Run php artisan migrate. This will create Laravel default tables and also creates a new table named "user_profiles". 
11) Data from "customers" table to be migrated to "users" and "user_profiles" table in "db_new" database.
12) Run php artisan serve
13) In Browser run localhost:8000, click on "Migrate Customer Data" button

# License
This is an MIT license, you can modify the code according to your requirements
