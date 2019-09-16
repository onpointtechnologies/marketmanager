<?php
require_once './config/config.php';

if (isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = md5($_POST["password"]);
  $sql = mysqli_query($conn,"SELECT id,email,password,position,name FROM users WHERE email='$email' AND password='$password'");
  if(mysqli_num_rows($sql)>0){
    $row=mysqli_fetch_array($sql);
    $email=$row['email'];
    $id=$row['id'];
    $position=$row['position'];
    $name=$row['name'];

    $_SESSION['name']=$name;
    $_SESSION['id']=$id;
    $_SESSION['email']=$email;
    if($row['position']=='Farmer'){
      header("location: farmerHome.php ");
    }elseif ($row['position']=='Wholesaler') {
      header("location: wholesaler.php ");
    }else{
    echo"Username or password may be incorrect";
    //header("location: sign-in.php");
  }


  }else{
    echo"Username or password may be incorrect";
    //header("location: sign-in.php");
  }
  /*$sql->execute([$_POST["email"]]);
  $res = $sql->fetch();
  $admin = $res['is_admin'];
  if (!password_verify($_POST["password"], $res["password"]))
  {
    $sign_in_alert = '<p class="text-danger">Email and password combination are incorrect.</p>';
  }
  else
  {
    $_SESSION["authenticated_user"] = $res["id"];

    if ($admin == '1') {
      $_SESSION['isAdmin'] = true;
      header("location: admin.php ");
    } else {
      header("location: markets.php ");
    }



  }*/
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Arkitu">
    <meta name="keywords" content="arkitu">

    <!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/logo.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Saas</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <br>

    <div class="container">
       <?php
            include "includes/generalHeader.php";
            ?>
    </div>



    <div class="container">

      <br>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <center><h4 class="fancy">Sign In</h4>
          <hr class="mt-0">
          <?//=$sign_in_alert?>
          <form action="" method="post">
            <fieldset class="form-group">
              <input name="email" value="" placeholder="Email" type="text" class="form-control" autofocus>
<!--                <input name="email" value="--><?//=htmlspecialchars($_POST["email"])?><!--" placeholder="Email" type="text" class="form-control" autofocus>-->
            </fieldset>
            <fieldset class="form-group">
              <input name="password" placeholder="Password" type="password" class="form-control">
              <!-- <small class="form-text text-muted"><a href="/reset">Forgot your password?</a></small> -->
            </fieldset>
            <fieldset class="form-group">
              <input name="submit" type="submit" value="Sign In" class="btn btn-primary">
            </fieldset>
          </form>
          <br>
          <hr>
Do not have an account?<br />
          <a href="registerFarmer.php" class="">Register as Farmer</a> or 
          <a href="registerWholesaler.php" class="">Register as Wholesaler</a>

          <br>
          <!-- <h4 class="fancy">Don't have an account?</h4>
          <hr class="mt-0">
          <a href="sign-up.php" class="btn btn-primary" role="button">Sign Up</a></center> -->
        </div>

        <div class="col-sm-4"></div>
      </div>

      <hr>

    </div>

    <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  </body>
</html>
