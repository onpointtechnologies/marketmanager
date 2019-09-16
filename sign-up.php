<?php
require_once './config/config.php';

session_destroy();
  header("location: sign-in.php");

