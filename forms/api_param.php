<?php

require_once '../config/config.php';

echo $authenticated_user;

//$value = $_POST['value'];
$vendor_name = $_POST["vendor_name_api"];
$business_name = $_POST["business_name_api"];
$address = $_POST["address_api"];
$city = $_POST["city_api"];
$phone = $_POST["phone_api"];
$email = $_POST["email_api"];
$type = $_POST["type_api"];
$website = $_POST["website_api"];
$facebook = $_POST["facebook_api"];
$instagram = $_POST["instagram_api"];
$wic = $_POST["wic_api"];
$product_api = $_POST["product_api"];
$product_location_api = $_POST["product_location_api"];

    $i = array();
    array_push($i, $vendor_name, $business_name, $address, $city, $phone, $email, $type, $website, $facebook, $instagram, $wic, $product_api, $product_location_api);

    $insert = array();
    foreach ($i as $course) {
        if (!empty($_POST[$course])) {
            $insert[] = $course;
        }
    }

    $sql = $db->prepare('INSERT IGNORE INTO api (user_id, value) VALUES (?, ?)');

    foreach($insert as $row)
    {
        $sql->execute(array($authenticated_user, $row));
    }


print_r($insert)

// echo $vendor_name;
// echo $business_name;
// echo $address;
// echo $city;
// echo $phone;
// echo $email;
// echo $website;
// echo $facebook;
// echo $instagram;
// echo $wic;
// echo $authenticated_user;




?>
