<?php
require_once '././config/config.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="./css/select2.css" rel="stylesheet" />
<script src="./js/select2.js"></script>



<fieldset>
    <div class="form-group">
        <label for="vendor_name">Vendor Name (Same as Certified Producer, if any) *</label>
          <input type="text" name="vendor_name" value="<?php echo $edit ? $vendor['vendor_name'] : ''; ?>" placeholder="Vendor Name" class="form-control" required="required" id="vendor_name" >
    </div>

    <div class="form-group">
        <label for="business_name">Business Name *</label>
        <input type="text" name="business_name" value="<?php echo $edit ? $vendor['business_name'] : ''; ?>" placeholder="Business Name" class="form-control" required="required" id="business_name">
    </div>

  <div class="form-group">
    <label for="choose_market">Choose Market(s)</label>
    <select class=" myselect" multiple="true" name="choose_market" >
      <option>Select Event</option>
      <?php
      $sql = $db->prepare("SELECT market_name, id FROM markets ORDER BY market_name");
      $sql->execute();

      while ($market = $sql->fetch())
      {
        $selected = $market["id"] == $vendor_event ? ' selected' : '';

        echo '<option'.$selected.' value="'.htmlspecialchars($market["id"]).'">'.htmlspecialchars($market["market_name"]).'</option>';
      }
      ?>
    </select>
  </div>


    <div class="form-group">
        <label>Vendor Type * </label>
        <label class="radio-inline">
            <input type="radio" name="vendor_type" value="certified" checked="checked" <?php echo ($edit &&$vendor['vendor_type'] =='certified') ? "checked": "" ; ?> required="required" id="certified"/> Certified
        </label>
        <label class="radio-inline">
            <input type="radio" name="vendor_type" value="non-certified" <?php echo ($edit && $vendor['vendor_type'] =='non-certified')? "checked": "" ; ?> required="required" id="noncertified"/> Non-Certified
        </label>
        <label class="radio-inline">
            <input type="radio" name="vendor_type" value="ancillary" <?php echo ($edit && $vendor['vendor_type'] =='ancillary')? "checked": "" ; ?> required="required" id="ancillary"/> Ancillary
        </label>
    </div>

    <div class="form-group" id="certificate_number">
        <label for="certificate_number"> Certificate Number *</label>
        <input style="background: rgb(192,192,192)" type="text" name="certificate_number" value="<?php echo htmlspecialchars($edit ? $vendor['certificate_number'] : ''); ?>" placeholder="Certificate Number" class="form-control" required="required">
    </div>

    <div class="form-group" id="certificate_expiration">
        <label for="certificate_expiration">Expiration *</label>
        <input style="background: rgb(192,192,192)" type="text" name="certificate_expiration" value="<?php echo $edit ? $vendor['certificate_expiration'] : ''; ?>" placeholder="Certificate Expiration" class="form-control" required="required" id="certificate_expiration">
    </div>

    <div class="form-group" id="products_sold">
        <label for="certificate_expiration">Products being Sold *</label>
        <input style="background: rgb(192,192,192)" type="text" name="products_sold" value="<?php echo $edit ? $vendor['products_sold'] : ''; ?>" placeholder="Products being Sold" class="form-control" required="required" id="products_sold">
    </div>

    <br>

    <div class="form-group">
        <label for="email">Email</label>
            <input  type="email" name="email" value="<?php echo $edit ? $vendor['email'] : ''; ?>" placeholder="E-Mail Address" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
            <input name="phone" value="<?php echo $edit ? $vendor['phone'] : ''; ?>" placeholder="987654321" class="form-control"  type="text" id="phone">
    </div>

    <!--<div class="form-group">
        <label>Date of birth</label>
        <input name="date_of_birth" value="<?php echo $edit ? $vendor['date_of_birth'] : ''; ?>"  placeholder="Birth date" class="form-control"  type="date">
    </div>-->

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>

<script>
$(document).ready(function() {
    $("#products_sold").hide();
});

$('#certified').on('click', function () {
	$("#certificate_number").show();
  $("#certificate_expiration").show();
  $('#products_sold').hide();
});

$('#noncertified').on('click', function() {
	$("#products_sold").show();
  $('#certificate_number').hide();
  $('#certificate_expiration').hide();
});

$('#ancillary').on('click', function() {
  $("#products_sold").hide();
  $('#certificate_number').hide();
  $('#certificate_expiration').hide();
});

</script>

<script>
if ($('.myselect-service-package').length > 0) {
    $('.myselect-service-package').select2();
  };

  if ($('.myselect').length > 0) {
    $('.myselect').select2();
  };
</script>
