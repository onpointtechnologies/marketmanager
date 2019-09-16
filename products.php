<?php
require_once './config/config.php';
include_once 'includes/header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


$query = mysqli_query($conn,"SELECT * FROM markets");


//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 4;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;

$timezone = date_default_timezone_get('Pacific');
$date = date("Y-m-d");



?>
<style>
.modal-content {
  padding: 10px;

}

.table {
  word-wrap:break-word !important;
}
</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97558181-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-97558181-2');
</script>



<!--Main container start-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-6">
            <h1>Markets</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            	<button class="btn btn-success" data-toggle="modal" data-target="#addnewmarket" ><span class="glyphicon glyphicon-plus"></span> Add New Market</button>
	            </a>
            </div>
        </div>
    </div>
    <!--  Market Search-->
    <div class="well text-center filter-form">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
    <hr>

    <div class="row">
    <?php
    foreach ($query as $row){
      $end_date = $row['end_date'];
      $start_date = $row['start_date'];
      $is_closed = ($end_date > $date) && ($date < $start_date);
    ?>
      <div class="col-md-<?php echo $bootstrapColWidth; ?>">
        <div class="thumbnail" <?= $is_closed ? 'style="background-color: #C0C0C0;"' : ''?> >

          <center>
            <div class="logo"><img  src="img/<?php echo htmlspecialchars($row['img_url']) ?> "  alt="" title="" /></div>
            <h3><?php echo htmlspecialchars($row['market_name']); ?></h3>
            <div>Manager: <?php echo htmlspecialchars($row['manager_name']) ?> </div>
            <div><i>Day: <?php echo htmlspecialchars($row['market_day']) ?></i> </div>
            <br>
            <a href='checkout.php?market_id=<?php echo $row['public_id'] ?>'  class="btn btn-success" style="margin-right: 8px;" <?= $is_closed ? 'disabled' : ''?> ><span class="glyphicon glyphicon-arrow-right"></span></a>
            <a href='reports.php?market_id=<?php echo $row['public_id'] ?>'  class="btn btn-primary" style="margin-right: 8px;" ><span class="glyphicon glyphicon-list-alt" id="closed"></span></a>
            <br>
            <?=$is_closed ? '<div style="background-color: #E55D65; ">Closed for the Season! </div>' : ''?>
           </center>
           <br>
        </div>
      </div>

      <?php
        $rowCount++;
        if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
      }
      ?>

    </div>


                <!-- <?php
                $flat_fee = $row['flat_fee'];
                $percentage_fee = $row['percentage_fee'];

                if (isset($flat_fee) && isset($percentage_fee)) {
                  echo '$'.($flat_fee * 0.01).' '.$percentage_fee.'%';
                } else if (isset($flat_fee)) {
                  echo '$'.($flat_fee * 0.01);
                } else if (isset($percentage_fee)) {
                  echo $percentage_fee.'%';
                }
                ?> -->



<!--    Pagination links-->
    <div class="text-center">
    </div>
    <!--    Pagination links end-->


    <!-- Modal -->
    <div class="modal fade" id="addnewmarket" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-header"><h2>Add New Market</h2>
          </div>
          <br>
          <form action="" method="POST" id='newmarketform' novalidate>
            <!-- <center> <input type='file' id="imgInp" />
        <br>
        <img id="img_upload" alt="your image" height="100" /> </center>
              <br><hr><br>-->

                <div class="form-group">
                    <label for="market_name">Market Name *</label>
                      <input type="text" name="market_name" value="" placeholder="Market Name" class="form-control" required="required" id="market_name" >
                </div>

                <div class="form-group">
                    <label for="business_name">Market City *</label>
                    <input type="text" name="market_city" value="" placeholder="Market City" class="form-control" required="required" id="market_city">
                </div>

                <div class="form-group">
                    <label for="business_name">Market Phone *</label>
                    <input type="number" pattern="\d*" name="phone" value="" placeholder="Market Phone" class="form-control" required="required" id="phone">
                </div>
                <div class="form-group">
                    <label for="manager_name">Market Manager Name</label>
                    <input type="text" name="manager_name" value="" placeholder="Market Manager Name" class="form-control" required="required" id="manager_name">
                </div>

              <div class="form-group">
                <label for="choose_market">Certified *</label>
                <label class="radio-inline">
                    <input type="radio" name="certified" value="yes"  required="required" id="certified"/> Certified
                </label>
                <label class="radio-inline">
                    <input type="radio" name="certified" value="no"  required="required" id="noncertified"/> Non-Certified
                </label>
              </div>
              <div class="form-group">
                <label for="certificate_number">Certificate Number</label>
                <input type="text" name="certificate_number" value="" placeholder="Certificate Number" class="form-control"  id="certificate_number">
            </div>
            <div class="form-group">
              <label for="cdfa_app_id">CDFA Applicant ID</label>
              <input type="text" name="cdfa_app_id" value="" placeholder="CDFA Applicant Id" class="form-control"  id="cdfa_app_id">
          </div>
              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" value="" placeholder="Start Date" class="form-control" required="required" id="start_date">
            </div>
              <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" value="" placeholder=" End Date" class="form-control" required="required" id="end_date">
              </div>
              <div class="form-group">
                <label for="end_date">Market Hours</label>
                <input type="text" name="market_hours" value="" placeholder="2pm - 5pm" class="form-control" required="required" id="market_hours">
              </div>
              <div class="form-group">
                  <label for="flat_fee">Flat Fee</label>
                  <input type="number" pattern="\d*" name="flat_fee" value="" placeholder="Flat Fee" class="form-control"  id="flat_fee">
              </div>
              ~OR~
              <div class="form-group">
                  <label for="business_name">Percentage Fee</label>
                  <input type="number" pattern="\d*" name="percentage_fee" value="" placeholder="Percentage Fee" class="form-control"  id="percentage_fee">
              </div>
              <div class="form-group">
                  <label for="custom_fee">Custom Fee</label>
                  <input type="text"  name="custom_fee" value="" placeholder="Custom Fee" class="form-control"  id="custom_fee">
              </div>
              <div class="form-group" id="market_currency">
                <label for="market_currency"> Market Currency</label><br>
                <p id="currenices_added"></p>
                  <input type="text" name="market_currency_name[]" placeholder="Currency Name" id="market_currency_name" required="true" onkeyup="success()"/>
                  <input type="number" pattern="\d*" name="market_currency_value[]" placeholder="Currency Value"  id="market_currency_value" />
                  <input type="number" pattern="\d*" name="market_currency_dollar_value[]" placeholder="Currency Dollar Value" id="market_currency_dollar_value"/>
                  <button id="add_currency"href="#"> Add Currency</button>
              </div>
              <div class="form-group">
                  <label for="notes">Notes</label>
                  <textarea rows="3" cols="50" name="notes" value="" placeholder="Notes about market" class="form-control" id="notes"></textarea>
              </div>
                <div class="form-group text-center">
                    <label></label>
                    <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
                </div>
          </form>

        </div>
      </div>
    </div>
    <!---- Add Market Modal End -->

</div>
<!--Main container end-->
<script>


$(document).ready(function(){
	$("#newmarketform").submit(function(event){
		submitForm();
		return false;
	});

  $(':text').keyup(function() {
      if($('#market_currency_name').val() != "" && $('#market_currency_value').val() != "") {
         $('#submit').removeAttr('disabled');
      } else {
         $('#submit').attr('disabled', true);
      }
  });

var currencies = [];
var maxRows = 5;
var x = 1;


$('#add_currency').click(function(e) {
  event.preventDefault()
  if (x <= maxRows) {
    currencies.push({
      name: $('#market_currency_name').val(),
      value: $('#market_currency_value').val(),
      dollarValue: $('#market_currency_dollar_value').val()
    });
    document.getElementById("currenices_added").innerHTML = JSON.stringify(currencies, null, 4);

    console.log(currencies);

    var htmlStr = '';

    currencies.forEach(function(currency) {
      var name = currency.name;
      var value = currency.value;
      var dollarValue = currency.dollarValue;

      htmlStr += `<li>${name} ${value} ${dollarValue}</li>`;
    });

    document.getElementById("currenices_added").innerHTML = htmlStr;

    x++;
  }
});



function submitForm(){

  let data = {
    market_name: $('#market_name').val(),
    market_phone: $('#market_phone').val(),
    market_city: $('#market_city').val(),
    public_id: $('#public_id').val(),
    manager_name: $('#manager_name').val(),
    certified: $('#certified').val(),
    certificate_number: $('#certificate_number').val(),
    cdfa_app_id: $('#cdfa_app_id').val(),
    start_date: $('#start_date').val(),
    market_hours: $('#market_hours').val(),
    flat_fee: $('#flat_fee').val(),
    percentage_fee: $('#percentage_fee').val(),
    custom_fee: $('#custom_fee').val(),
    notes: $('#notes').val(),
    img_upload: $('img_upload').val(),
    currencies: currencies

  };

  console.log(data)


	 $.ajax({
		type: "POST",
    contentType: "multipart/form-data",
		url: "https://arkitu.co/manager/forms/add_market_form.php",
		cache:false,
		data: data,
    beforeSend:function(){

     $('#add_market').val("Inserting");
    },
		success: function(response){
      $('#newmarketform')[0].reset();
      $('#addnewmarket').modal('hide');
      $('.modal-backdrop').remove();
      $("#market_table").load(window.location + " #market_table");
      $(this).removeData('#newmarketform');

		},
		error: function(){
			alert("Error");
		}
	});
}






    $('#editmarketform').submit(false);
    function submiteditForm(){
      event.preventDefault();
    // var info = element.attr("id");
    	 $.ajax({
    		type: "POST",
    		url: "./forms/edit_market_form.php",
    		cache:false,
    		data: $('#editmarketform').serialize(),
        beforeSend:function(){
         $('#edit_market').val("Inserting");
        },
    		success: function(response){
          console.log('test')
          $('#editmarketform')[0].reset();
          $('#editmarket').modal('hide');
          $('.modal-backdrop').remove();
          $("#market_table").load(window.location + " #market_table");
          $(this).removeData('#editmarketform');


    		},
    		error: function(){
    			alert("Error");
    		}

    	});
    }

    $(function() {
    $(".delete").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = 'id=' + del_id;
    if(confirm("Are you sure you want to delete this?"))
    {
     $.ajax({
       type: "POST",
       url: "forms/delete_market.php",
       data: info,
       success: function(response){
         $("#market_table").load(window.location + " #market_table");
         //$('.delete').trigger('reset');
     },
    });
      $(this).parents(".show").animate({ backgroundColor: "blue" }, "slow")
      .animate({ opacity: "hide" }, "slow");
     }
    return false;
    });
    });
  });



$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#market_results tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
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




<?php include_once './includes/footer.php'; ?>
