<?php
session_start();
require_once './config/config.php';
include_once 'includes/header.php';

$query = "SELECT * FROM users WHERE id = '$authenticated_user'";
$query = $db->query($query);
$user_1 = $query->fetch();


?>

<br>
  <div class="container">
  <div class="row my-2">
      <div class="col-lg-8 order-lg-2">
          <div class="tab-content py-4">
                  <h1 class="mb-3">Settings</h2>
              </div>
              <div class="tab-pane" id="edit">
                  <form action="" method="post" id='edit_profile' novalidate>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Name</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" value="<?php echo $user_1['name'] ?>" name="name" >
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Email</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="email" value="<?php echo $user_1['email'] ?>" name="email">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Association</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" value="<?php echo $user_1['association'] ?>" name="association" >
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label"></label>
                          <div class="col-lg-6">
                              <input class="form-control" type="text" value="<?php echo $user_1['city'] ?>" placeholder="City" name="city">
                          </div>
                          <div class="col-lg-3">
                              <input class="form-control" type="text" value="<?php echo $user_1['state'] ?>" placeholder="State" name="state">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Password</label>
                          <div class="col-lg-9">
                              <input class="form-control" type="password" value="" name="password">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label"></label>
                          <div class="col-lg-9">
                              <button type="submit" class="btn btn-primary" value="">Save Changes</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <!-- <div class="col-lg-4 order-lg-1 text-center">
          <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
          <h6 class="mt-2">Upload a different photo</h6>
          <label class="custom-file">
              <input type="file" id="file" class="custom-file-input">
              <span class="custom-file-control">Choose file</span>
          </label>
      </div> -->
  </div>
</div>

<script>
$(document).ready(function(){
	$("#edit_profile").submit(function(event){

		submitForm();
		return false;
	});
});

function submitForm(){
	 $.ajax({
		type: "POST",
		url: "./forms/profile_form.php",
		cache:false,
		data: $('#edit_profile').serialize(),
    beforeSend:function(){
     $('#edit_profile').val("Inserting");
    },
		success: function(response){
      //$('#profile_form')[0].reset();

		},
		error: function(){
			alert("Error");
		}
	});
}
</script>


<?php include_once './includes/footer.php'; ?>
