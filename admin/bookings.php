<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }

// Include the config file
require_once('./functions/functions.php');

// Include the Header file
require_once('./template/common/header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Bookings
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'bookings.php' ?> ">Bookings</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Bookings</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                 <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Vehicle Name</th>
                  <th>Vehicle License</th>
                  <th>Vehicle Type</th>
                  <th>Service Name</th>                  
                  <th>Ordered Date</th>
                  <th>Status</th>
                  <th>View</th>
                
                </tr>
                </thead>
                <tbody>
                <?php
                	$resultbooking = getallBookings();
                	if(mysqli_num_rows($resultbooking) > 0) {
                		 while($row = mysqli_fetch_assoc($resultbooking)){ 
                		?>
                		<tr>
                  <td><?= $row['first_name'] ?></td>
                  <td><?= $row['last_name'] ?></td>
                  <td><?= $row['email'] ?></td>
                    <td><?= $row['vehicle_name'] ?></td>
                  <td><?= $row['license_no'] ?></td>
                  <td><?= $row['vehicle_type'] ?></td>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['ordered_date'] ?></td>
                  <td><?= $row['status'] ?></td>
                  <td>  <a href="view-booking-details.php?bookingid=<?= $row['booking_id'] ?>" > <i class="fa fa-eye fa-2x"></i> </a> </td>
                
                </tr>
                <?php }  } ?>
            </tbody>
              </table>
          </div>
           
        </div>
    </div>



<!-- Modal HTML -->



    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Form Validation -->
  <?php
// Include the Footer file
require_once('./template/common/footer.php');

?>
<script>
$(document).ready(function(){


  $("#deletecustomer").click(function(){
   
    console.log($(this).data("value"));
   
});




  $(function () {
  

  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
  }, "Alphabets only please");
  jQuery.validator.addMethod("lettersonly2", function(value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
  }, "Alphabets only please"); 

  jQuery.validator.addMethod("alphalettersonly", function(value, element) {
    return this.optional(element) || /^[a-z-0-9]+$/i.test(value);
  }, "AlphaNumbericLetters only please"); 
  $('#form_submit').click(function(){ 
    $("#bookingform").validate({
      rules: {

        firstname:{
          lettersonly: true,
          required: true
        },
        lastname:{
          lettersonly: true,
          required: true
        },
        email:{
          email: true,
          required: true,
          remote: {
            url: "<?php echo $config['admin_url'] ?>ajax/checkemail.php",
            type: "post"
          }
        },
        phone:{
          digits: true,
          required: true
        },
        username:{
          alphalettersonly: true,
          required: true,
          remote: {
            url: "<?php echo $config['admin_url'] ?>ajax/checkusername.php",
            type: "post"
          }
        },
        password:{
          required: true,
          minlength : 5
        },
        cpassword:{
          required: true,
          equalTo: "#password"
        },
        street:{
          required: true
        },
        city:{
          lettersonly2: true,
          required: true
        },
        postalcode:{
          required: true
        },
        state: {
          lettersonly2: true,
          required: true
        },
        country: {
          lettersonly2: true,
          required: true
        }
      },
      messages:{

        firstname:{
          required: "First name required*"
        },
        lastname:{
          required: "Last name required*"
        },
        email:{
          email: "Invalid Email Address",
          required: "Email required*",
          remote: "Email Already Exist!"
        },
        phone:{
          digits: "Only digits allowed",
          required: "Phone required*"
        },
        username:{
          required: "username required*",
          remote: "Username Already Exist!"
        },
        password:{
          required: "Password required*"
        },
        cpassword:{
          required: "Confirm Password required*",
          equalTo: "Password doesnot match"

        },
        street:{
          required: "Street required*"
        },
        city:{
          required: "City required*"
        },
        postalcode:{
          required: "Postal Code required*"
        },
        state: {
          required: "State required*"
        },
        country: {
          required: "Country required*"
        }


      },
      invalidHandler: function() {
        $( "#summary" ).text( $( "#bookingform" ).validate().numberOfInvalids() + " field(s) are invalid" );
      },
      submitHandler: function(form) {

        var form_data = {
          firstname: $('#firstname').val(),
          lastname: $('#lastname').val(),
          email: $('#email').val(),
          phone : $('#phone').val(),
          username: $('#username').val(),
          password: $('#password').val(),
          street: $('#street').val(),
          city: $('#city').val(),
          postalcode: $('#postalcode').val(),
          state: $('#state').val(),
          country: $('#country').val(),
          customer: 1
         
        };
        $.ajax({
          url : "<?php echo $config['admin_url'] ?>ajax/add-customer.php",
          type :"POST",
          data: form_data,
          success: function(msg){
            if(msg == 'bookingerror'){
              $("#summary").html('<div class="alert alert-danger"><p>Some Went Wrong! Try Again</p></div>');
              $("#form_submit").attr("disabled", true);
              setTimeout(function(){
                window.location.reload(1);
              }, 9000);
             
            }else{
              $("#form_submit").attr("disabled", true);
              $("#summary").html('<div class="alert alert-success"><p>Booking Done!</p></div>');
              setTimeout(function(){
                window.location.reload(1);
              }, 9000);
            }
          }
        });
        return false;
      }
    });
});

});
});
</script>


</body>
</html>