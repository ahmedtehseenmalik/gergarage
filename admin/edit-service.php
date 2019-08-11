<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }

// Include the config file
require_once('./functions/functions.php');


$service_id = intval($_GET['service_id']);



	$service = getoneservice($service_id);
        
    if(mysqli_num_rows($service) > 0 ){
         while ($row = mysqli_fetch_array($service)) { 
               
            $name = $row['name'];
            $cost = $row['cost'];
            $points = $row['points'];

            }
        }


// Include the Header file
require_once('./template/common/header.php');



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Service
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'add-service.php' ?> ">Add Service</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Service</h3>
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
              <input type="hidden" id="serviceid" name="serviceid" value="<?= $service_id?>">
                <label for="servicename">Service Name*</label>
                <input type="text" class="form-control" id="servicename" name="servicename" aria-describedby="servicename" placeholder="Service Name" value="<?=$name?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="servicecost">Service Cost*</label>
                <input type="number" class="form-control" id="servicecost" name="servicecost" aria-describedby="servicecost" placeholder="Service cost"value="<?=$cost?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="servicepoints">Service Points*</label>
               <select id="servicepoints" name="servicepoints" class="form-control">
               <option value=null>Select Points</option>
                <option value="1">1</option>
                <option value="2">2</option>
               </select>
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

        servicename:{ 
          required: true
        },
        servicecost:{
            digits: true,
          required: true
        },
        servicepoints:{
            digits: true,
          required: true
        }
       
      },
      messages:{

        servicename:{
          required: "Service name required*"
        },
        servicecost:{
          required: "Service Cost required*"
        },
        servicepoints:{
         
          required: "Service Points required*",
          
        }
      },
      invalidHandler: function() {
        $( "#summary" ).text( $( "#bookingform" ).validate().numberOfInvalids() + " field(s) are invalid" );
      },
      submitHandler: function(form) {

        var form_data = {
            serviceid:$('#serviceid').val(),
            servicename: $('#servicename').val(),
            servicecost: $('#servicecost').val(),
            servicepoints: $('#servicepoints').val(),
            service: 1
         
        };
        $.ajax({
          url : "<?php echo $config['admin_url'] ?>ajax/edit-service.php",
          type :"POST",
          data: form_data,
          success: function(msg){
            if(msg == 'serviceerror'){
              $("#summary").html('<div class="alert alert-danger"><p>Some Went Wrong! Try Again</p></div>');
              $("#form_submit").attr("disabled", true);
              setTimeout(function(){
                window.location.reload(1);
              }, 2000);
             
            }else{
              $("#form_submit").attr("disabled", true);
              $("#summary").html('<div class="alert alert-success"><p>Service Updated!</p></div>');
              setTimeout(function(){
                window.location.reload(1);
              }, 2000);
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