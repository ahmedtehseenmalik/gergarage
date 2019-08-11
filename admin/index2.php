<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['mechaniclogin']) AND ($_SESSION['usertype'] != 'mechanics')) {
	header('Location:' . $config['admin_url'] . 'mechanics-login.php');
  }
$employee_id=intval($_SESSION['mechaniclogin']);
// Include the config file
require_once('./functions/functions.php');

// Include the Header file
require_once('./template/common/mec-header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome <?php echo $_SESSION['name']; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index2.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

   

    <!-- Main content -->
    <section class="content">

      <!-- Show Today's Booking -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Change Availability Status </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="row">
        <form id="formavailability">
        <div class="col-md-4">
         <div class="form-group">
            <label for="availablemechanics">Your Availablity</label>
            <select name="availablemechanics" id="availablemechanics"  class="form-control">
                        <option value="">Select Availablity</option>
                        <?php
                         if(getmechanicsavail($_SESSION['userid']) == 'yes'){ ?>
                        <option value="yes" selected>yes</option>
                        <option value="no">no</option>
                      <?php }else{ ?>
                        <option value="yes">yes</option>
                        <option value="no" selected>no</option>
                      <?php  } ?>
                        
            </select>
          </div>
         
          </div>
          </div>
          <div>
                <p id="summary"> </p>
          </div>
          <div class="row">
              <div class="col-md-offset-3 ">
                        <button type="submit" class="btn btn-primary" id="updateavailability" name="updateavailability">Update</button>
              </div>
          </div>
          </form>
        </div>
    </div>
     <!-- /. Show Today's Booking -->

	<!-- Show Today's roaster -->
      
     <!-- /. Show Today's Roaster -->

    </section>
    <!-- /.content -->



    <section class="content">

<!-- Show Today's Booking -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Change Password </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
  
    <div class="row">
    <form id="formpassword">
    <div class="col-md-4">
    <div class="form-group">
        <label for="changepassword">New Password</label>
        <input type="password" id="changepassword" name="changepassword" class="form-control" placeholder="New Password" >
      </div>    
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-4">
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm Password" >
    </div>
  </div>
            <div>
                <p id="summary1"> </p>
          </div>
  <div class="row">
      <div class="col-md-offset-3 ">
                <button type="submit" class="btn btn-primary" id="updatepassword" name="updatepassword">Update</button>
      </div>
  </div>
</form>
  </div>
</div>
<!-- /. Show Today's Booking -->

<!-- Show Today's roaster -->

<!-- /. Show Today's Roaster -->

</section>



  </div>
  <!-- /.content-wrapper -->

  <?php
// Include the Footer file
require_once('./template/common/footer.php');

?>

<style>

.ft-size{
  font-size:2.5em;
  padding-left:10px;
 
}

</style>


</body>





<script>
$(document).ready(function(){

	jQuery.validator.addMethod("lettersonly", function(value, element) {
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Alphabets only please");
	jQuery.validator.addMethod("lettersonly2", function(value, element) {
		return this.optional(element) || /^[a-z ]+$/i.test(value);
	}, "Alphabets only please"); 

	jQuery.validator.addMethod("alphalettersonly", function(value, element) {
		return this.optional(element) || /^[a-z-0-9]+$/i.test(value);
	}, "AlphaNumbericLetters only please"); 


	$('#updateavailability').click(function(){ 
		$("#formavailability").validate({
			rules: {

				availablemechanics:{
					required: true
				}
			},
			messages:{

				availablemechanics:{
					required: "Availablity  required*"
				}
			},
			invalidHandler: function() {
				$( "#summary" ).text( $( "#formavailability" ).validate().numberOfInvalids() + " field(s) are invalid" );
			},
			submitHandler: function(form) {
				
				var form_data = {
					status: $('#availablemechanics').val(),
          employee_id:<?= $employee_id?>,
          savb:1
				             	
				};
			
				$.ajax({
					url : "<?php echo $config['admin_url'] ?>ajax/update-employee-availability.php",
					type :"POST",
					data: form_data,
					success: function(msg){
					
						if(msg == 'error'){
						
							$("#formavailability").attr("disabled", true);
              $("#summary").html('<div class="alert alert-danger"><p>Something Went Wrong Please Try Again !</p></div>');
							setTimeout(function(){
								window.location.href = 'index2.php';
							}, 2000);
						}else{

							$("#formavailability").attr("disabled", true);
              $("#summary").html('<div class="alert alert-success"><p>Updated Successfully!</p></div>');
							setTimeout(function(){
								window.location.href = 'index2.php';
							}, 2000);
						}
					}
				});
				return false;
			}
		});
});




$('#updatepassword').click(function(){ 
		$("#formpassword").validate({
			rules: {

				changepassword:{
					required: true
				},
				confirmpassword:{
					required: true,
          equalTo:"#changepassword"
				}
			},
			messages:{

				changepassword:{
					required: "Password required*"
				},
				confirmpassword:{
					required: "Password  required*",
          equalTo: "Both Password are not same!"
				}
			},
			invalidHandler: function() {
				$( "#summary1" ).text( $( "#formpassword" ).validate().numberOfInvalids() + " field(s) are invalid" );
			},
			submitHandler: function(form) {
				
				var form_data = {
				
					password: $('#changepassword').val(),
          employee_id:<?= $employee_id?>,
          cpsw:1
				};
			
				$.ajax({
					url : "<?php echo $config['admin_url'] ?>ajax/update-employee-password.php",
					type :"POST",
					data: form_data,
					success: function(msg){
				
						if(msg == 'error'){
							
							$("#formpassword").attr("disabled", true);

							$("#summary1").html('<div class="alert alert-danger"><p>Something Went Wrong Please Try Again !</p></div>');
							setTimeout(function(){
								window.location.href = 'index2.php';
							}, 2000);
						}else{

							$("#formpassword").attr("disabled", true);
							$("#summary1").html('<div class="alert alert-success"><p>Updated Successfully!</p></div>');
							setTimeout(function(){
								window.location.href = 'index2.php';
							}, 2000);
						}
					}
				});
				return false;
			}
		});
});





});
</script>









</html>