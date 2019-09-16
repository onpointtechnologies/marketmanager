

<fieldset>
    <div class="form-group">
        <label for="f_name">Market Name *</label>
          <input type="text" name="market_name" value="<?php echo $edit ? $customer['market_name'] : ''; ?>" placeholder=" Cambria Farmers Market" class="form-control" required="required" id = "market_name" >
    </div>

    <!--<div class="form-group">
        <label for="l_name">Last name *</label>
        <input type="text" name="l_name" value="<?php echo $edit ? $customer['l_name'] : ''; ?>" placeholder="Last Name" class="form-control" required="required" id="l_name">
    </div>-->

    <div class="form-group">
        <label for="address">Address</label>
          <textarea name="address" placeholder="Address" class="form-control" id="address"><?php echo ($edit)? $customer['address'] : ''; ?></textarea>
    </div>

    <div class="form-group">
        <label>Certified * </label>
        <label class="radio-inline">
            <input type="radio" name="certified" value="yes" <?php echo ($edit &&$customer['certified'] =='yes') ? "checked": "" ; ?> required="required"/> Yes
        </label>
        <label class="radio-inline">
            <input type="radio" name="certified" value="no" <?php echo ($edit && $customer['certified'] =='no')? "checked": "" ; ?> required="required" id="no"/> No
        </label>
    </div>


    <div class="form-group">
        <label>Start Date</label>
        <input name="start_date" value="<?php echo $edit ? $customer['start_date'] : ''; ?>"  placeholder="Start Date" class="form-control"  type="date">
    </div>

    <div class="form-group">
        <label>End Date</label>
        <input name="end_date" value="<?php echo $edit ? $customer['end_date'] : ''; ?>"  placeholder="End Date" class="form-control"  type="date">
    </div>

    <div class="form-group">
        <label>Vendor Type * </label>
        <label class="radio-inline">
            <input type="radio"  value="both" checked="checked" required="required" id="both_fees"/> Both
        </label>
        <label class="radio-inline">
            <input type="radio" name="flat_fee" value="flatfee"  required="required" id="flatfee"/> Flat Fee
        </label>
        <label class="radio-inline">
            <input type="radio" name="percentage_fee" value="percentage" required="required" id="percentage"/> Percentage
        </label>

    </div>

    <div class="form-group" id="flat_fee">
        <label for="flat_fee"> Flat Fee *</label>
        <input type="text" name="flat_fee" value="<?php echo htmlspecialchars($edit ? $customer['flat_fee'] : ''); ?>" placeholder="Flat Fee" class="form-control" required="required">
    </div>

    <div class="form-group" id="percentage_fee">
        <label for="percentage_fee">Percentage of Sales*</label>
        <input type="text" name="percentage_fee" value="<?php echo $edit ? $customer['percentage_fee'] : ''; ?>" placeholder="5%" class="form-control" required="required" id="percentage_fee">
    </div>






    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>
</fieldset>

<script>


$('#flatfee').on('click', function() {
	$("#flat_fee").show();
  $("#percentage_fee").hide();
  $('#both_fees').hide();
});

$('#percentage').on('click', function() {
	$("#percentage_fee").show();
  $('#flat_fee').hide();
  $('#both_fees').hide();
});

$('#both_fees').on('click', function() {
  $("#both_fees").show();
  $('#flat_fee').show();
  $('#percentage_fee').show();
});

</script>
