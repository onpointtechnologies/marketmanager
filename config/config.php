<?php

session_start();
//PDO
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "corephpadmin";


    $conn=mysqli_connect($db_host, $db_user,$db_pass,$db_name);

/*try
{
  $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn=mysqli_connect($db_host, $db_user,$db_pass,$db_name);

}
catch (PDOException $e)
{
  echo "Cannot connect to database.";
	exit;
}

$authenticated_user = $_SESSION["authenticated_user"];
$authenticated = isset($authenticated_user) ? true : false;

if ($_GET["signout"]) if (session_destroy()) header("location: sign-in.php");*/

?>
