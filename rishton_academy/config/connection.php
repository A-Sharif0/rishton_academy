<?php 

$sql_db_host = "localhost";
$sql_db_user = "root";
$sql_db_pass = "";
$sql_db_name = "rishton_academy";

define("sql_db_host", $sql_db_host);
define("sql_db_user", $sql_db_user);
define("sql_db_pass", $sql_db_pass);
define("sql_db_name", $sql_db_name);


session_start();

$connect = mysqli_connect(sql_db_host, sql_db_user, sql_db_pass, sql_db_name);
if (mysqli_connect_errno()) {
    echo "Sorry, the database is not connected: " . mysqli_connect_error();
}

?>