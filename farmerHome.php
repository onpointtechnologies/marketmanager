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
            <h4>Farmer Dashboard</h4>
        </div>
       
    </div>
    <hr>

    <div class="row">
   

    </div>


<!--    Pagination links-->
    <div class="text-center">
    </div>
    <!--    Pagination links end-->

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
