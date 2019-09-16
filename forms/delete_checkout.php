<?php
     require_once '../config/config.php';

     $id = $_POST['id'];

     echo 'ID: '.$id.'\n';
     //$query = "DELETE FROM checkout where ID = $id";

     $sql = $db->prepare("DELETE FROM checkout where ID = ?");
     $sql->execute([$id]);

     echo 'Success: ' . $id;


?>
