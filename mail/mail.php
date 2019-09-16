<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
require_once '../config/config.php';

// $q1 = "SELECT * FROM users WHERE id = '25'";
// $q1 = $db->query($q1);
// $q3 = $query->fetch();
//       //Vars//
// $manager_email = $q3['email'];
// $manager_name = $q3['name'];

//$business_name = $_POST["business_name"];
$date = $_POST["checkout_date"];
$sellers_fee = $_POST["sellers_fee"];
$market_name = $_POST["checkout_market_name"];
$owed = $_POST["total_owed"];
$mm_vouchers = $_POST["mm_vouchers"];
$mm_tokens = $_POST["mm_tokens"];
$piersons_amount = $_POST["piersons_amount"];
$comment = $_POST["comment"];
$open_door = $_POST["open_door"];
$ebt_tokens = $_POST["ebt_tokens"];
$fmnp_fvc = $_POST["fmnp_fvc"];
$custom_owed = $_POST["custom_owed"];
$sales = $_POST["total_sales"];
$admin_email = $_POST['admin_email'];
$img_url = $_POST['img_url'];
$business_name = $_POST['business_name'];
$vendor_email = $_POST['vendor_email'];

//echo $vendor_email;



$mail = new PHPMailer;

$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "farmersmarketcheckout@gmail.com";
$mail->Password = "farmerscheckout";

$mail->setFrom('cammybuilds@gmail.com', $market_name);
$mail->addReplyTo($admin_email, $admin_email);
$mail->addAddress($vendor_email, $business_name);

$mail->Subject = "This is your reciept for '$date' ";

$mail->msgHTML(
'<div id="mid">
  <div class="info">
  <div class="logo"><img width: "12" height: "12" src="http://localhost:8888/phpadmin/img/'.$img_url.' "  alt="" title="" /></div>
    <div>'.$date.' </div>
    <div>'.$market_name.' </div>

  </div>
</div>
<div id="bot">
  <div id="table">
    <!-- Reciept -->
    <table id="receipt">
      <tr class="service">
        <td class="tableitem">Vendor: </td>
        <td class="tableitem" width="200"><div id="vendornameoutput" value="">'.$business_name.'</div></td>
      </tr>
      <tr class="service">
        <td class="tableitem"><strong>Fee</strong></span></td>
        <td class="tableitem" width="200"><span id="totalsalesoutput" value="" style="color:grey;">$'.$sellers_fee.$custom_owed.'</span></td>

      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>EBT Tokens</strong></td>
        <td class="tableitem" width="200"><span id="paid" value="" style="color:grey;">$'.$ebt_tokens.'</span></td>
      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>MM Tokens</strong></td>
        <td class="tableitem" width="200"><span id="paid" value="" style="color:grey;">$'.$mm_tokens.'</span></td>
      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>MM Vouchers</strong></td>
        <td class="tableitem" width="200"><span id="paid" value="" style="color:grey;">$'.$mm_vouchers.'</span></td>
      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>FMNP FVC</strong></td>
        <td class="tableitem" width="200"><span id="paid" value="" style="color:grey;">$'.$fmnp_fvc.'</span></td>
      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>Open Door</strong></td>
        <td class="tableitem" width="200"><span id="paid" value="" style="color:grey;">$'.$open_door.'</span></td>
      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>Piersons</strong></td>
        <td class="tableitem" width="200"><span id="paid" value="" style="color:grey;">$'.$piersons_amount.'</span></td>
      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>Comment</strong></td>
        <td class="tableitem" width="200"><span id="Comment" value="" style="color:grey;">'.$comment.'</span></td>
      </tr>
      <br>
      <tr class="service">
        <td class="tableitem"><strong>Paid</strong></td>
        <td class="tableitem" width="200"><span id="Comment" value="" style="color:grey;">$'.$owed.'</span></td>
      </tr>


    </table>
    <!-- Reciept -->
  </div><!--End Table-->
  <hr>
  <div id="legalcopy">
    <p class="legal"><strong>Thank you for your business!</strong></p>
  </div>

</div>
</div>'


);

$mail->AltBody = 'This is a plain-text message body';
//$mail->addAttachment('../img/northcoast.png');

if (!$mail->send()) {
    // echo json_encode("Mailer Error: " . $mail->ErrorInfo);
    echo 'failed';
} else {
    echo 'sent';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
