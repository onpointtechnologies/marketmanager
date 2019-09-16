<?php

require_once '../config/config.php';
header('Access-Control-Allow-Origin: *');



$sql = $db->prepare("INSERT INTO reports (report_name, name_of_certified_producer, certificate_number, issuing_county, dates_participated, total, users_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sql->execute(array( $_POST["report_name"], $_POST["name_of_certified_producer"], $_POST["certificate_number"], $_POST["issuing_county"], $_POST["dates_participated"], $_POST["total"], $authenticated_user));



?>
