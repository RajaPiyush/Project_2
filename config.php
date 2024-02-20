
<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login');

// Try connecting to the database

// mysql_connect() establishes a connection to a MySQL server. 
//In PHP, variables are defined using the $ symbol followed by the variable name.

/*
In the provided PHP code snippet, `$` is a symbol used to declare variables. In PHP, variables are defined using the `$` symbol followed by the variable name. Here's what each variable represents:

In summary:
- `$conn` is a variable that holds the database connection object.
- `DB_SERVER`, `DB_USERNAME`, `DB_PASSWORD`, `DB_NAME` are constants representing database configuration parameters.
*/

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check the connection
if($conn === false){
    dir('ERROR: Could not connect.');
}
?>

