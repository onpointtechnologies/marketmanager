<?php
session_start();
require_once './config/config.php';


$q1 = $db->prepare("SELECT * FROM checkout WHERE id = ? ");
$q1->execute([$_GET['id']]);
$reciept = $q1->fetch();



include_once 'includes/header.php';
?>




<div id="invoice-POS">

  <center id="top">
    <div class="logo"><img width: "12" height: "12" src="img/<?php echo $img ?>"  alt="" title="" /></div>
    <div class="info">
      <h4><?php echo $fee['market_name'] ?></h4>
    </div><!--End Info-->
  </center><!--End InvoiceTop-->

  <div id="mid">
    <div class="info">
      <input id="checkout_date_3" type="text" readonly>
    </div>
  </div><!--End Invoice Mid-->

  <div id="bot">
    <div id="table">
      <!-- Reciept -->
      <table id="receipt">
        <tr class="service">
          <td class="tableitem">Vendor: </td>
          <td class="tableitem" width="200"><div id="vendornameoutput" value=""><?=htmlspecialchars($reciept['business_name'])?></div></td>
        </tr>
        <tr class="service">
          <td class="tableitem"><strong>Sales</strong></span></td>
          <td class="tableitem" width="200"><span id="totalsalesoutput" value="" style="color:grey;">$<?= htmlspecialchars($reciept['total_owed'])?></span></td>
        </tr>
        <br>
        <tr class="service">
          <td class="tableitem"><strong>Paid</strong></td>
          <td class="tableitem" width="200"><span id="paid" value="" style="color:grey;">$<?= htmlspecialchars($reciept['total_sales'])?></span></td>
        </tr>
      </table>
      <!-- Reciept -->
    </div><!--End Table-->
    <hr>
    <div id="legalcopy">
      <p class="legal"><strong>Thank you for your business!</strong></p>
    </div>

  </div>
</div>




  <?php include_once './includes/footer.php'; ?>
