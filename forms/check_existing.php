<?php
/**
 * Created by PhpStorm.
 * User: Fakhar
 * Date: 20-Mar-19
 * Time: 3:17 PM
 */

require_once '../config/config.php';

$q = "SELECT * FROM wic WHERE wic_number='".$_GET['number']."' AND DATE(checkout_date) >= DATE(DATE_SUB(NOW(),INTERVAL 1 YEAR))";

$res=mysqli_query($conn, $q);

if(mysqli_num_rows($res)>0){
    echo '1';
}else {
    echo '0';
}