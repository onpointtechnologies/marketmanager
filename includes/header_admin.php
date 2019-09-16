<?php
// REDIRECT //////////////////////////////////////////////////


///////////////////Query for Markets ////////////////////////
// $quser = $db->prepare("SELECT * FROM users WHERE id = ?");
// $quser->execute(array($authenticated_user));
// $user_query = $quser->fetch();

// $user_email = $user_query['email'];
// header('Access-Control-Allow-Origin: *');
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

        <link  rel="stylesheet" href="css/style.css"/>

        <!-- Custom CSS -->
        <!-- Custom Fonts -->
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Latest minified bootstrap css -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">


        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link href="./css/select2.css" rel="stylesheet" />
        <script src="./js/select2.js"></script>
        <link href="js/jquery.validate.min.js">

        <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
        <!-- <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
    <script src="./js/jquery-ui.js"></script>
    <script src="./js/jquery-ui-1.12.1.js"></script>





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
       <li class=""><a href="admin.php">Home</a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-area-chart"></i> <?php echo $user_email;?><span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li class="nav-item"><a class="nav-link" href="?signout=✓">Sign Out </a></li>
           <li class="nav-item"><a class="nav-link" href="profile.php?users_id=<?= $authenticated_user ?>">Profile</a></li>
         </ul>
         <li class="#"><a href="support.php">Support</a></li>
       </li>





      </ul>
      </ul>
      </div>
      </div>
      </nav>

            <br><br>
            <!-- The End of the Header -->
