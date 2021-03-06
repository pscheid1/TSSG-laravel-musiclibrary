# TSSG-laravel-musiclibrary
Laravel implementation of TSSG music library

###[Documentation:] (https://laravel.com/docs)
This is very comprehensive document and is updated for each major release. I think the link will take you to the latest version but if not, you can 
select it from the drop down in the red square in the upper right hand corner of the home page. (Click on 'Documentation:' to view in browser.)

### [Cheat Sheet:] (http://learninglaravel.net/cheatsheet)
The above link is to what is know as the **Cheat Sheet**. This is not "official" Laravel documentation but it is a very good abbreviated reference 
of everything Laravel.  In the left hand menu you can select specific categories that will present an expnded list of related commands or 
code.  There are no definitions, just the syntax. **Warning: this document is not at level 5.3 at this time.** (Click on 'Cheat Sheet:' to view in browser.)

### [5.3 Cheat Sheet:] (http://www.phplab.info/categories/cheet-sheets/laravel-53-cheat-sheet)
There is a Cheat Sheet for 5.3 but at this time it only contains Artisan commands. (Click on '5.3 Cheat Sheet:' to view in browser.)

Here are a few steps that should get you started with setting up this project.  Regardless of your environment  
(platform, OS, etc) you should be able to use the following steps to get Laravel and this project up and running.
 
**Note:
In the following comments, \<root> refers to the folder you cloned or copied the project into.  It is the parent folder for app and the rest of the project
folders.**  

You will need the following applications.  Install them and test them according to your specific environment.  

1. PHP.  I have been using version 7.0.3 with xdebug v2.4.0.  
2.  A SQL server database.  Out of the box Laravel supports SQLite, MySQL, SQL Server and Postgres.I have been using MySQL version 5.7.
3.  You can probably use just about any web server.  I have installed the Apache web server but Laravel contains a built-in server that is great for testing so up to this point I have not used the Apache server.  
4.  Google composer downloads and selects the correct version for your environment.  
    - Install composer.  
    - Move compose.phar to a global location
    - Add composer to the environment path 
    - Composer install will install packages required by Laravel in the composer.json file.
    - Composer.autoloader will auto load required classes thereby eliminating the need to keep adding required packages.
    - To create a new laravel project (not required when downloading an existing project.)  
        Laravel new `<project name>`  
            or  
        Composer create-project laravel/laravel  `<project>` 

Connect to Github.com.  Search for TSSG and locate TSSG-laravel-musiclibrary project.  It will be under my account (pscheid1).
Select the branch to be downloaded.  Currently (02/22/17) the master branch is up to date and should be the branch selected.  If at a later date some new branch is ahead on commits, then you will have to decide which branch to download.  Download or Clone this project into your desired working directory.

Follow the following steps to update the project with the latest Laravel code.  Some of these steps may not be necessary but they should not cause any harm if they are not.

From a command window, run the following commands:  

1.  cd to the project directory.  The app folder (along with many others) should be the next level down.
2.  composer self-update This updates composer itself.(if you just installed composer this step is probably not needed.
3.  If it exists, delete the <project>/vendor folder.
4.  composer update (This will update the project and add the most curent vendor folder.)
5.  npm install
6.  bower install
7.  if the following folders do not exist, create them.  (This should no longer be necessary but if it is, add the following folders.)  
    &nbsp;&nbsp;&nbsp;&nbsp;`<root>/storage/framework/`  
    &nbsp;&nbsp;&nbsp;&nbsp;`<root>/storage/framework/sessions`  
    &nbsp;&nbsp;&nbsp;&nbsp;`<root>/storage/framework/views`  
    &nbsp;&nbsp;&nbsp;&nbsp;`<root>/storage/framework/cache`  
8.  php artisan cache:clear
9.  php artisan config:clear
10.  php artisan view:clear
11. Set up your MySQL (or other database.) Open the .env file and either set your database up for the DB_XXXX parameters or change them to agree with your settings.
12. php artisan migrate
13. php artisan db:seed
14. If you want to use the artisan server:
    - php artisan serve (this will run the laravel built in server)
    - In your browser go to http://localhost:8000 (if everything is working, the login page should display)  
 15. Otherwise start your own server and access your base URL.

#### Laravel Music Library Instructions
    
This project is a partial implementation of the TSSG Musicians Manger.  It is not an exact match of Musician's Manager
    functionally but is reasonably close.
    If you receive the logon page as a result of step 15 above, you can logon with administrator/password.  You should 
    then receive the Home page displaying the Welcome paragraph.
    
#####  Test Account Information
  
You can get the userId from the usersTableSeeder.php file.  Currently they are:  
  
- **administrator**  
- **billygoat**  
- **gjetson**  
- **casper**
- **daffyduck**
- **testuser1** through **testuser10**

The default password for all seed accounts enabled for logon is **password**.

The menu bar will display the Musicians Manager label on the left and the following tabs:  
   
- The **Musicians Manager** label is a hot link to the "Home" page.  
- **Events**           None of the entries in this dropdown has been enabled.  They will return an under construction page  
- **Music**             This dropdown provides for listing, editing, and adding songs and instruments  
- **Members**       This dropdown provides for listing, editing, and adding members  
- **Admin**            This dropdown provides for listing, editing and adding styles, tempos, proficiencies, and roles 

The right side of the menu bar will display the userId of the logged on user (if any) and a link to either logon, logoff or register a new user depending on the current state.  
Anyone that can access the web site can create a new account by simply selecting **register** and filling out the form.  This account will 
be a guest account with very limited access.  A user with **admin** rights may upgrade this account at any time.  Additionally, an **admin** 
can create an account at any time with any of the available functionality.  
  
The access rights of a member are determined by roles.  Every member must have at least one role that is assigned when an
account is created.  Additional roles may be assigned by a member with an administrator role.  When a member logs on, the 
account will have an attribute called **current role**.  If a member has only one assigned role, it will always be the current role. 
If a member has multiple roles, the account can perform operations permitted by the current role.  If a member has multiple roles, 
the current role at logon will be what ever it was at the end of their previous logon. If a member with multiple roles
desires to perform operations permitted by one of their other assigned roles, they must edit their account and select the desired
role from the list of roles assigned to their account.  They must then select **update** to complete the request. 
Only an administrator can add/delete roles to/from an account. When a user logs on, their rights are determined by their current 
role.  If a logged on user selects a new current role, their rights will be recomputed based on the new role.
  
Roles and their associated rights are *hard coded*..  To create a new role or change the rights associated with a role, code modification 
is required.  Other than that, all the other table entries are modifiable through the provided interface.  
  
Most of the functionality works the same for all elements.  Use any **List** menu item to itemize an individual table.  From the list 
you can selectively edit or delete individual items.  The one major difference is with group membership.  You must first use **Add Group**
to create a new group.  During this process you will have to select a member to act as the group leader.  The available group
leaders are those who have a role of **band manager**.  This does not have to be their current role but the member must
have this role assigned to them.  When you create the group, the band manager will automatically be made a member of
the group.  To add additional members to a group you need to list the groups and select one for edit.  When a group is open 
for edit, one of the panels will list all members available to become members.  Select one or more (Ctrl select) and select 
update.  Members listed in the available for membership panel are all members that have a role of musician or substitute musician 
that are not already members.  The same process (Ctrl select / update) in the members panel can be used to remove one or more
members from the group. To change the group leader for a group select a new entry from the group leader drop down.  When update 
is selected the new group leader will be assigned and will also be made a member of the group if they are already not one.  The group 
leader that was replaced will be removed from the group unless that member is also assigned a role of musician or substitute musician. 
In this case we do not know if the member was assigned to the group as a result of being selected as the group leader or was manually 
assigned because of their role of musician.  In this case if the member is to be removed from the group it must be done manually, 
the same as any other group member. Band Managers can be band leaders/members of multiple groups.  Members can also 
be members of multiple groups.  
  
### Unit Testing

There is extensive testing built into Laravel but at this point it looks like it takes a bit of work to utilize it.  There is a section titled "Application Testing"
in the documentation listed above. There is also a unitTest category in the Cheat Sheet listed above but it may not be up to date. There is a very
simple test built into any "out of the box" project.  If you create a new Lavarel project it has a home page that displays "Laravel 5".  The simple
test will issue a url to the server and assert that the text string "Laravel" is contained on the returned page.

I have modified a few things so this test will work with the Musicians Manager project.  The supplied test case is accomplished by running the 
following test class:  **\<root>\tests\ExampleTest.php**.  I have replace the string "Laravel" mentioned above with the string "Password".
When the Musicians Manager project is first accessed it will return a logon request page that will display among other things the "Password" string. 
To implement this test the phpunit.xml file was copied to the \<root> folder and the test name was changed to ExampleTest.php.  From a command window,
CD to \<root> and execute \vendor\bin\phpunit.bat (Windows) otherwise execute phpunit. This will issue a logon request and the logon pages should be
returned.  The page will be scanned to determine if the string 'Password' is on the page. The results should display **OK (1 test, 2 assertions).**

Obviously this isn't much of a test.  This is mainly to begin the process of figuring out how to test a Laravel project utilizing the internal test framework.

###The modify-password branch is now merged into master.  This includes the following changes:

* Any user may now changed their password by using the edit option on their own account.
* An administrator may change the password of any account.
* The "Forgot my password" option has been added to the logon page.  An input screen will be returned asking for a userid and
email address.  If they are validated, a URI containing a key will be sent to the email address.  Use the URI to receive a second
input form requesting your userid, email address, password and conformation password.  Send this form and if the information is 
validated your password will be reset.  This operation must be completed within 60 minutes of the first request or the request will
be rejected. (for testing without a mail server, you can get the information from the laravel log - /storage/logs/laravel.log)
* There are new seed record accounts. The above list has been updated with the new userid's.  pscheid is nolonger a valid userid.
* All seed record accounts are created with 'password' as their password.
* The NAVBAR home tab has been deleted.
* The NAVBAR icon (Musicians Manager) is now a 'home' screen link.
* The default timezone is now EST w/daylight savings time.

###The pagination branch is now merged into master.  This includes the following changes:

* All 'List' commands contain automatic pagination.
* Each page will contain Page n of n in the lower left hand corner.
* Below the Page n of n line will be a block containing a previous icon followed by page numbers followed by a next icon.
* Previous will be disabled on the first page and next will be disabled on the last page.
* If there is only one page to be displayed, the next/previous data is not displayed.
* On the lower right hand side of the page is a Lines/page dropdown containing selection for 10, 15, 25, 50 and 100 lines per page.  
* Each list may be initialized to a different lines/page entry.
* If a new lines per page is selected, the entry is saved on a per list per user basis.

###The add_column_sorting branch is now merged into master.  This includes the following changes:

* List commands contain various columns that may be sorted.
* Columns that can be sorted are indicated by yellow text on a blue background.  Non sortable columns are white on blue.
* When hovering over a sortable column heading, the heading will disappear.
* Selecting a column to be sorted will cause the list to be redisplayed.
* When a column as been sorted, the column heading will contain an up or down arrow indicating the column is now in ascending or descending order.
* We referrer to it as column sorting but the reality is that the rows are sorted based on the column data.
* Each sort request results in a new sort request and a new listing of the data.  In other words, previous sorts have no affect on later sorts.

I will add more to this document as we progress with testing.  For now, I think you will be able to figure out how to accomplish 
what you want.  Some of the functionality is somewhat strange.  I'm sure some of that is do to something on my part but some of
it is because I attempted to imitate the operation of version 2 of musicians manger.  I am interested in what you find as you 
attempt to use this implementation.  What you like, don't like, don't understand or can't figure out. Please let me know via email, 
meetings or the wiki.  In addition to the Events tab, there are some Laravel items that I would like to implement just to learn more
about them.  
  
Let me know if you need help with anything.   












    