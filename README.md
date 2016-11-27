# TSSG-laravel-musiclibrary
Laravel implementation of TSSG music library


Here are a few steps that should get you started with setting up this project.  Regardless of your environment (platform, OS, etc) you
should be able to use the following steps to get Laravel and this project up and running.

You will need the following applications.  Install them and test them according to your specific environment.

    1.  PHP.  I have been using version 7.0.3 with xdebug v2.4.0.

    2.  A SQL server database.  Out of the box Laravel supports SQLite, MySQL, SQL Server and Postgres.  I have been using
	MySQL version 5.7.
    3.  You can probably use just about any web server.  I have installed the Apache web server but Laravel contains a built in server that
	is great for testing so up to this point I have not used the Apache server.
    4.  Google composer download and select the correct version for your environment.  Install composer.  

            Move compose.phar to a global location
            Add to path 
            Composer install will install packages required in composer.json
            Composer.autoloader will auto load required classes thereby eliminating the need to keep adding required packages.
                To create a new laravel project (not required when downloading an existing project.)
                Laravel new <project name>
	Or
                Composer create-project laravel/laravel  <project> 
                    .env APP_ENV=local (for development)

    Connect to Github.com.  Search for TSSG and locate TSSG-laravel-musiclibrary project.  It will be under my account (pscheid1).

    Select the branch to be downloaded.  Currently (11/27/16) the master branch is up to date and should be the branch selected.  If at a later
    date some new branch is ahead on commits, then you will have to decide which branch to download.  Download or Clone this project into your
    desired working directory.

    Follow the following steps to update the project with the latest Laravel code.  Some of these steps may not be necessary but they should not
    cause any harm if they are not.

    From a command window, run the following commands:
    1. cd to the project directory.  The app folder (along with many others) should be the next level down.
    2. composer self-update This updates composer itself.(if you just installed composer this step is probably not needed.
    3. If it exists, delete the <project>/vendor folder.
    3. composer update (This will update the project and add the most curent vendor folder.)
    4. npm install
    5. bower install
    6. if the following folders do not exist, create them.
        <project>/storage/framework/
                sessions
                views
                cache
    7. php artisan cache:clear
    8. php artisan config:clear
    9. php artisan view:clear
    I need to work through and expand the following but until I do you may be able to figure it out youself.
    10. Set up your MySQL (or other database.) Open the .env file and either set your database up for the DB_XXXX parameters or change
          them to agree with your settings.
    11. php artisan migrate
    12. php artisan db:seed
    13. php artisan serve (this will run the laravel built in server)
    14. In your browser go to http://localhost:8000 (if everything is working, the login page should display)

