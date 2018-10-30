Page index.php is actually home page with links to login.php and register.php,bellow you can see search form that redirects to results.php. 

Page login.php after login shows welcome message bellow the form, and after 5 seconds redirects to index.php(home page).

Page register.php has ajax function to check if there’s user with written email(see page duplicateuser.php), everything else is intuitive.

Page results.php uses function similar_text to see if query text is similar to email or name, and if similarity is over 35% that user will be shown. 

File logout.php just destroys session and redirects  to index.php(home page).

File login_logic.php  is php logic that is used when someone tries to login, but because we have two pages using it (login.php and results.php), 
it’s in different php file.

File core.php has everything about connecting to db, session and sanitizing strings.

Folder \css has important css files

Folder \img has important images for pages login.php and register.php

Installation instructions:

You just need to execute commands from database_code.sql in you mysql console or in phpMyAdmin.


