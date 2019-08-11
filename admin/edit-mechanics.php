<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
  header('Location:' . $config['admin_url'] . 'login.php');

  }

// Include the config file
require_once('./functions/functions.php');

$mechanic_id = intval($_GET['mechanicid']);



	$mechanic = getonemechanic($mechanic_id);
        
    if(mysqli_num_rows($mechanic) > 0 ){
         while ($row = mysqli_fetch_array($mechanic)) { 
               
            

                $first_name = $row['first_name'];
                $last_name = $row['last_name']; 
                $email = $row['email']; 
                $phone = $row['phone']; 
                $username = $row['username']; 
                $street = $row['street']; 
                $postal_code = $row['postal_code'];
                $state = $row['state'];
                $city = $row['city']; 
                $country = $row['country'];
                $password =  $row['password'];
                




            }
        }
    
?>


<?php 



// Include the Header file
require_once('./template/common/header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Mechanic
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'mechanics.php' ?> ">Edit Mechanic</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
       
          <h3 class="box-title">Edit Mechanic</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form  id="bookingform" name="bookingform">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <input type="hidden" class="form-control" id="mechanicid" name="mechanicid"  value="<?=$mechanic_id?>">
                <label for="firstname">First Name*</label>
                <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstname" placeholder="First Name" value="<?=$first_name?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Last Name*</label>
                <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" placeholder="Last Name" value="<?=$last_name?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Your Email" value="<?=$email?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone*</label>
                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phone" placeholder="Last Name" value="<?=$phone?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username*</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Username" value="<?=$username?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password*</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="lastname" placeholder="Enter your password" value="<?=$password?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="cpassword">Confirm Password*</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" aria-describedby="cpassword" placeholder="Username" value="<?=$password?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="street">Street*</label>
                <input type="text" class="form-control" id="street" name="street" aria-describedby="street" placeholder="Enter Street" value="<?=$street?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">City*</label>
                <input type="text" class="form-control" id="city" name="city" aria-describedby="city" placeholder="Enter City" value="<?=$city?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="postalcode">Postal Code*</label>
                <input type="text" class="form-control" id="postalcode" name="postalcode" aria-describedby="postalcode" placeholder="Enter Postal Code" value="<?=$postal_code?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="state">State*</label>
                <input type="text" class="form-control" id="state" name="state" aria-describedby="state" placeholder="Enter State" value="<?=$state?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country*</label>
                <input type="text" class="form-control" id="country" name="country" aria-describedby="country" placeholder="Enter Country" value="<?=$country?>">
              </div>
            </div>
          </div>
          
          <div class="row">
        <div class="col-md-12">
          <div id="summary" class="error"></div>
          <br/>
          <button type="submit" id="form_submit" class="btn btn-primary">Update</button>
        </div>
      </div>
        </form>
           
        </div>
    </div>
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
            url: "<?php echo $config['admin_url'] ?>ajax/checkemailforupdatemechanic.php?mechanicid=<?= $mechanic_id ?>",
            type: "POST"
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
            url: "<?php echo $config['admin_url'] ?>ajax/checkusernameforupdatemechanic.php?mechanicid=<?= $mechanic_id ?>",
            type: "POST"
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
        console.log('i am comming');
        var form_data = {
          mechanicid:$('#mechanicid').val(),
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
          mechanic: 1
         
        };
        $.ajax({
          url : "<?php  echo $config['admin_url'] ?>ajax/edit-mechanic.php",
          type :"POST",
          data: form_data,
          success: function(msg){
          
           if(msg == 'mechanicediterror'){
              $("#summary").html('<div class="alert alert-danger"><p>Some Went Wrong! Try Again</p></div>');
              $("#form_submit").attr("disabled", true);
              setTimeout(function(){
                window.location.reload(1);
              }, 9000);
             
            }else{
              $("#form_submit").attr("disabled", true);
              $("#summary").html('<div class="alert alert-success"><p>Mechanic Updated !</p></div>');
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