My cuberoute project's README

First install PHP on the local machine.

List of packages to install
- libapache2-mod-php7.4               
- php7.4

    Install composer globally based on the machine OS from here: https://getcomposer.org/doc/00-intro.md#globally
    Download and install MySQL Workbench (<Optional_can_use_database_client_of_choice>) based on the OS from here: https://dev.mysql.com/downloads/workbench/
        After MySQL Workbench is installed open the application and follow the instructions to set up a database user.
    For Linux then:
        Run: mysql -u <userNameFromMySqlWorkbenchUser> -p on the terminal.
        Enter the correct password for the database user to open MySQL Workbench.
        Run: CREATE DATABASE <dataBaseName> to create a database.
    After cloning the project connect to local machine database.
        Run: cp .env.example .env in the project folder example-app.
        Edit the new .env file to connect to the database.
        In the .env file replace default database name, username and password with the correct one.
    On the terminal in the project folder example-app RUN: 
    ~ composer install
    ~ php artisan migrate --seed //This will create and run all migrations and seeders in the database.
    ~ php artisan key:generate
        
    On the terminal in the project folder example-app RUN: php artisan serve.
        This will host the example-app project in the local server, click to the link.
        
        Use default username: admin@admin.com
        and default password: password
    
    Then the project is up and running

QUICK LINKS

    Laravel MVC architecture was used in the cuberoute project.

    Models location
        app/Http/Controllers/Admin

    Controllers location
        app/Http/Controllers/Admin

    Request handlers location
        app/Models

    Api and Web routes can be found in the routes/ folder

    