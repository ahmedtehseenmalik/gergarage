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
        Add Stock
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'add-stock.php' ?> ">Add Stock</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Stock</h3>
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
                <label for="itemname">Item Name*</label>
                <input type="text" class="form-control" id="itemname" name="itemname" aria-describedby="itemname" placeholder="Item Name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="itemcost">Item Cost*</label>
                <input type="number" class="form-control" id="itemcost" name="itemcost" aria-describedby="itemcost" placeholder="Item cost">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="itemquentity">Item Quantity*</label>
                <input type="number" class="form-control" id="itemquantity" name="itemquantity" aria-describedby="itemquantity" placeholder="Item Quantity">
              </div>
            </div>
           
          <div class="row">
        <div class="col-md-12">
          <div id="summary" class="error"></div>
          <br/>
          <button type="submit" id="form_submit" class="btn btn-primary">Add</button>
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

        itemname:{ 
          required: true
        },
        itemcost:{
            digits: true,
          required: true
        },
        itemquantity:{
            digits: true,
          required: true
        }
       
      },
      messages:{

        itemname:{
          required: "Item name required*"
        },
        itemcost:{
          required: "Item Cost required*"
        },
        itemquantity:{
         
          required: "Item Quantity required*",
          
        }
      },
      invalidHandler: function() {
        $( "#summary" ).text( $( "#bookingform" ).validate().numberOfInvalids() + " field(s) are invalid" );
      },
      submitHandler: function(form) {

        var form_data = {
            itemname: $('#itemname').val(),
            itemcost: $('#itemcost').val(),
            itemquantity: $('#itemquantity').val(),
            stock: 1
         
        };
        $.ajax({
          url : "<?php echo $config['admin_url'] ?>ajax/add-stock.php",
          type :"POST",
          data: form_data,
          success: function(msg){
            if(msg == 'stockerror'){
              $("#summary").html('<div class="alert alert-danger"><p>Some Went Wrong! Try Again</p></div>');
              $("#form_submit").attr("disabled", true);
              setTimeout(function(){
                window.location.reload(1);
              }, 9000);
             
            }else{
              $("#form_submit").attr("disabled", true);
              $("#summary").html('<div class="alert alert-success"><p>Stock Done!</p></div>');
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