<?php

require_once '../config/config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$state = $_POST['state'];
$password = $_POST['password'];
$association = $_POST['association'];

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = $db->prepare("UPDATE users SET name = ?, email = ?, city = ?, state = ?, password = ?, association = ? WHERE id = ?");
$sql->execute(array( $name, $email, $city, $state, $password, $association, $authenticated_user));




?>
