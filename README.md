### chair-rental-management-system
A complete end to end (customer to admin) rental management system with online payment gateway

### Installation 


### Rental Service Software installation process

This software is based on PHP and MySQL technologies and some client side languages like HTML, CSS and JavaScript (JQuery). This application was built with Codeigniter framrwork in other to maintain a  well structured program with programming architecture like MVC (Model View Controller).

Step 1: download xampp localhost server https://www.apachefriends.org/ and install it following the normal windows/linux installation process depending on your type of OS.
 
Step two: Unzip the project files and move the project folder to C:\xampp\htdocs, note the name of the project folder.

Step 2: In this step, you will need to setup a database for the project, we believed that you have xampp install in your system. Firstly, goto your favourite browser eg Chrome, enter the following address http://localhost/phpmyadmin, you will see something like this below.














On the left hand side is the list of database you have so much in your localhost, now click on NEW to create a new database and name it rental_service. You should see something like this below.















Now click on IMPORT, and following the process displayed they to import the sql file found in C:\xampp\htdocs\your_project_name\doc. The name of this sql file is rentel_service.sql. with this we are done with creating a database for the application.

Step 3: In this step we are going to configure the project database configuration to match the one in your system. 

Now to the project folder C:\xampp\htdocs\your_project_folder\application\config\database.php, open the file with any text editor or IDE and goto where we have.

````$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '63045120Zealnetworks0011.',
	'database' => 'rental_service',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
````
Change the username and password to match your localhost mysql setting.

With the above setting, you’ve have been able to install this application, you can test it by visiting this URL in your browser http://localhost/your_project_folder

Thank you.

