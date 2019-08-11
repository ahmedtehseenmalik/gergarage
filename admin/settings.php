<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }

  $user_id=$_SESSION['userid'];
// Include the config file
require_once('./functions/functions.php');

// Include the Header file
require_once('./template/common/header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

  


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
                    user_id:<?= $user_id?>,
                    cpsw:1
				};
			
				$.ajax({
					url : "<?php echo $config['admin_url'] ?>ajax/update-admin-password.php",
					type :"POST",
					data: form_data,
					success: function(msg){
					
						if(msg == 'error'){
							
							$("#formpassword").attr("disabled", true);

							$("#summary1").html('<div class="alert alert-danger"><p>Something Went Wrong Please Try Again !</p></div>');
							setTimeout(function(){
								window.location.href = 'settings.php';
							}, 2000);
						}else{

							$("#formpassword").attr("disabled", true);
							$("#summary1").html('<div class="alert alert-success"><p>Updated Successfully!</p></div>');
							setTimeout(function(){
								window.location.href = 'settings.php';
							}, 2000);
						}
					}
				});
				return false;
			}
		});
});


</script>









</html>