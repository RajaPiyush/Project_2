<?php
/**In PHP, a session refers to a way to preserve data across subsequent HTTP requests. It allows you to store variables that can be accessed and manipulated throughout a user's interaction with your website or web application. */
// session ko start kao
// commnet about the code in detail
// unset all the session variables
session_start();
// unset() function is used to destroy any other variable and same as session_unset() function is used to destroy all the session variables.
$_SESSION = array();
// Finally, destroy the session.
session_destroy();
// redirect to login page
header("location: login.php");


?>