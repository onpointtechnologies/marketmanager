<?php
// REDIRECT //////////////////////////////////////////////////

/*if (!$authenticated) header("location: sign-in.php");

///////////////////Query for Markets ////////////////////////
$quser = $db->prepare("SELECT * FROM users WHERE id = ? ");
$quser->execute(array($authenticated_user));
$user_query = $quser->fetch();

$user_email = $user_query['email'];
header('Access-Control-Allow-Origin: *');*/

//$user_email =  $_SESSION['email'];
 ?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="img/logo.png">
        <link rel="apple-touch-icon" href="img/logo.png">

        <title>Market Checkout</title>


        <link rel="stylesheet"  href="css/lightslider.css"/>

        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link  rel="stylesheet" href="css/style.css"/>
        <link  rel="stylesheet" href="css/bootstrap-select.min.css"/>

        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="js/touchswipe.min.js"></script>
        <script src="js/slick.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="js/jquery.validate.min.js">
        <script src="./js/jquery-ui.js"></script>
        <script src="./js/jquery-ui-1.12.1.js"></script>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css"> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script> -->
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap-multiselect.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>








    </head>



    <body >

      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <div class="navbar-header">
       <button type="button"class="navbar-toggle pull-left"data-toggle="collapse" data-target="#example-navbar-collapse">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>

       <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#"><img width: "25" height: "25" src="img/logosm.png"  alt="" title="" /></a> -->
      </div>
      <div class="collapse navbar-collapse" id="example-navbar-collapse">

      <ul class="nav navbar-nav navbar-left">
          <ul class="nav navbar-nav">
       <li class=""><a href="farmerHome.php">Home</a></li>
       <li class=""><a href="markets.php">Markets</a></li>
       <li><a href="vendors.php"> View Vendors</a></li>
       <li> <a href="reports.php"> View Market Reports</a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="profile.php?users_id=<?php echo $_SESSION['id'];?>"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];?></a>
        
         <li class=""><a class="" href="sign-up.php">Sign Out </a></li>
         <li class="#"><a href="support.php">Support</a></li>
       </li>





      </ul>
      </ul>
      </div>
      </div>
      </nav>

            <br><br>
            <!-- The End of the Header -->
