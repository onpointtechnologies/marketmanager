<?php
require_once './config/config.php';

if (isset($_POST["submit"])){
  $name = $_POST["name"];
   $phoneNumber = $_POST["phoneNumber"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $location = $_POST["location"];
  $gender = $_POST["gender"];
  $DoB = $_POST["DoB"];
  $cropType = $_POST["cropType"];
  
  //$comfirmPassword = $_POST["comfirmPassword"];
  $password = $_POST["password"];


    if(!isset($_FILES['picture'])){
        echo "No file selected";
    }
    else{

        $error=array();
        $extension=array("jpeg","jpg","png","gif");
            $file_name=$_FILES["picture"]["name"];
            $file_tmp=$_FILES["picture"]["tmp_name"];
            $size=$_FILES["picture"]["size"];
            $ext=pathinfo($file_name, PATHINFO_EXTENSION);
            if(in_array($ext,$extension))
            {
               // if($_FILES['picture']!="") {

                    if (!file_exists("userpic/" . $file_name)) {


                        if (move_uploaded_file($file_tmp = $_FILES["picture"]["tmp_name"], "userpic/" . $file_name)) {
                            //echo "Success on File Not Exist";
                            // $insert = insertFile($file_name);
                            /* if($insert){
                                 header("location: index.php?success=true");
                             }
                             else{
                                 echo mysqli_error();
                             }*/

                            $filepath = "userpic/". $file_name;
                        }

                    } else {
                        $filename = basename($file_name, $ext);
                        $newFileName = $filename . time() . "." . $ext;
                        if (move_uploaded_file($file_tmp = $_FILES["picture"]["tmp_name"], "userpic/" . $newFileName)) {
                            //echo "Success on File Exist";
                            //$insert = insertFile($newFileName);
                            /*  if($insert){
                                  header("location: index.php?success=true");
                              }*/

                            $filepath = "userpic/" . $newFileName;
                        }
                    }
              /*  }else{
                    $result = "SELECT * FROM company";
                    $query = mysqli_query($conn,$result);
                    $row = mysqli_fetch_array($query);

                    $filepath=$row['companyLogo'];

                    move_uploaded_file($file_tmp,$filepath);
                }*/

            }
            else{
                $message = "<span class='text-danger bg-danger'>The file type should be jpeg,jpg,png,gif </span>".mysqli_error($conn);
                $_SESSION['message'] = $message;
                header('location:registerFarmer.php');
            }


    }


  $alert="";
  $sql = mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
  if (mysqli_num_rows($sql)>0){
    $alert = '<p class="text-danger">Email is already registered.</p>';
  }else{
    $password = md5($password);

    $query = mysqli_query($conn,"INSERT INTO users (position,password,name,email,phoneNumber,address,location,gender,DoB,cropType,picture) VALUES ('Wholesaler','$password','$name','$email','$phoneNumber','$address','$location','$gender','$DoB','$cropType','$filepath')");

    if($query){
      //$alert = '<p class="text-danger">Thanks. Your have been registered successfull.</p>';
      header("location: sign-in.php");
    }else{
      $alert = '<p class="text-danger">Opps!!. There is an error in your registeration.</p>';
      //header("location: markets.php");
    }

    //$_SESSION["authenticated_user"] = $db->lastInsertId();

    //$_SESSION["authenticated_user"] = $email;

    
  }
  
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sign Up: Farmer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Arkitu">
  <meta name="keywords" content="arkitu">

  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
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
        <div class="col-sm-2">

        </div>
        <div class="col-sm-4">
          <h4 class="fancy">Sign Up as Wholer saler</h4>
          <hr class="mt-0">
          <?php
              //echo $alert;
          ?>
          <form action="" method="post">
            <div class="form-group">
              <input name="name" placeholder="Full Name" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <input name="phoneNumber" placeholder="Phone number" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <input name="email" placeholder="Email" type="email" class="form-control" required="">
            </div>
            <div class="form-group">
              <input name="address" placeholder="Address" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <input name="location" placeholder="Location(Region and street name)" type="text" class="form-control" required="">
            </div>
            <div class="form-group">
              <select name="gender" class="form-control">
                <option>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <input name="DoB" placeholder="Date of birth" type="date" class="form-control date-picker" id="date-picker" required="">
            </div>
            <div class="form-group">
              <input name="cropType" placeholder="Type of crop you sell" type="text" class="form-control" required="">
            </div>
             <div class="form-group">
              <label>Upload your picture</label>
              <input name="picture" placeholder="Upload your picture" type="file" class="form-control" required="">
            </div>
            <div class="form-group">
              <input name="password" placeholder="Password" type="password" class="form-control" required="">
            </div>
            <!-- <div class="form-group">
              <input name="comfirmPassword" placeholder="Comfirm Password" type="password" class="form-control" required="">
            </div> -->


            <div class="form-group">
              <div class="g-recaptcha" data-sitekey="6Lfy0h0UAAAAAPpeZi7TeJk1NFnZGM29rLonILbr"></div>
            </div>
            <div class="form-group">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                I agree to the <a href="terms">Terms of Use</a>.
              </label>
            </div>
            <div class="form-group">
              <input name="submit" type="submit" value="Sign Up" class="btn btn-primary">
            </div>
          </form>
          <br><br>
        </div>
        <div class="col-sm-6">
          <a href="registerFarmer.php" class="">Already have an account sign in here</a> <br /> 
          <a href="registerFarmer.php" class="">Register as Farmer</a>
        </div>


      </div>

      <hr> <center>

    </center>

    </div>

    <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="//www.google.com/recaptcha/api.js"></script>
  </body>
</html>
