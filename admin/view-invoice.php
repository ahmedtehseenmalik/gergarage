<?php 
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }

 

// Include the config file
require_once('./functions/functions.php');

$invoice_id=intval($_GET['invoiceid']);


$invoice=getoneInvoiceforModification($invoice_id);
if(mysqli_num_rows($invoice) > 0 ){
    while ($row = mysqli_fetch_array($invoice)) { 
          
           $first_name = $row['first_name'];
           $last_name = $row['last_name'];
           $phone = $row['phone'] ;
           $vehicle_name = $row['vehicle_name'];
           $license_no = $row['license_no'];
           $name = $row['name']; 
           $cost = $row['servicecost'];
           $totalcost=$row['cost'];
           $discount = $row['discounts'];

          
       }
   }
   $invoice=getstockitemsforInvoice($invoice_id);
   if(mysqli_num_rows($invoice) > 0 ){
       while ($row = mysqli_fetch_array($invoice)) { 
             
            
           
             
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
        View Invoice
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'view-invoice.php' ?> ">View Invoice</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Invoice</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                <input type="hidden" id="invoiceid" value="<?= $invoice_id ?>" >
                    <table class="table" id="invoicetable" name="invoicetable">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tr>
                            <td>Customer:</td>
                            <td><?= $first_name.' '.$last_name  ?></td>
                        </tr>
                        <tr>
                            <td>Mobile No:</td>
                            <td><?=  $phone ?></td>
                        </tr>
                        <tr>
                            <td>Vehicle:</td>
                            <td><?=  $vehicle_name ?></td>
                        </tr>
                        <tr>
                            <td>Licence:</td>
                            <td><?= $license_no  ?></td>
                        </tr>
                        <tr>
                            <td><?= $name?></td>
                            <td><?='€'.$cost ?></td>
                        </tr>
                        <?php
                            $stockitems = getstockitemsforInvoice($invoice_id);
                            if(mysqli_num_rows($stockitems) > 0) {
                                while($row = mysqli_fetch_assoc($stockitems)){ 
                                ?>
                                <tr>
                                <td><?=$row['name']?></td>
                                <td><?='€'.$row['cost']?></td>
                                </tr>
                        <?php }  } ?>
                        <tr id="tottal" style="border-top:2px solid #000;">
                            <td>Total</td>
                            <td id="total" ><?='€'.$totalcost ?></td>
                        </tr>
                        <tr>
                            <td>Discounts</td>
                            <td><?='€'.$discount ?></td>
                        </tr>
                    </table>
                </div>
            </div>

     

            <div class="row">
            <div class="col-md-1 offset-4">
            <a href="invoice.php" class="btn btn-primary">Back</a>
            </div>

            </div>
           
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

        $('#additems').click(function(){
           
            // var stockitemsids=$('#stockitems').val();
            // var currentText = $(":selected", '#stockitems').text();



            // $('#invoicetable tr:last').after('<tr><td>'+stockitems+'</td></tr>');
            
            
        });




        
function addItemstoTable(item, index) {
  $('#invoicetable tr:last').after('<tr><td>'+item+'</td></tr>');
}
    var selectedItemsIds='';
    var newTotal='';

        $('#stockitems').click(function(){
            var stockitemsids=$('#stockitems').val();
            selectedItemsIds=selectedItemsIds+stockitemsids+',';
          
            var stockitems = $(":selected", this).text();
          //  stockitems.forEach(addItemstoTable);
          var cost = $('option:selected', this).attr('cost');
         // console.log(cost);
            $('#invoicetable #tottal').before('<tr><td id="sitemid" itemid="'+stockitemsids+'">'+stockitems+'</td><td id="tcost" >'+ '€'+cost+'</td><td><button id="removeitem" name="removeitem"><i class="fa fa-times"></i></button>'+'</td></tr>');
           var total=document.getElementById ( "total" ).innerText;
            var costtotal=total.substr(1);
             newTotal=parseInt(costtotal)+parseInt(cost);
            $("#total").html('€'+newTotal);  
          
        });
       
        

  
        $('#invoicetable').on("click", "#removeitem", function(e) {
        
         var itemcost=$(this).closest('tr').children('td#tcost').text();
         var idtoremove=$(this).closest('tr').children('td#sitemid').attr('itemid');
         var removeid=idtoremove.toString();
         var endIndex = selectedItemsIds.indexOf(removeid);
      
          if (endIndex != -1)  
          {
            var selectedItemsIdsPart1 = selectedItemsIds.substring(0, endIndex);
            var selectedItemsIdsPart2 = selectedItemsIds.substring(endIndex+1);
            selectedItemsIds= selectedItemsIdsPart1+selectedItemsIdsPart2
            selectedItemsIds= selectedItemsIds.replace(/\D/g, "");
          
          }
         var item_cost=itemcost.substr(1);
         var total=document.getElementById ( "total" ).innerText;
        var costtotal=total.substr(1);
            newTotal=parseInt(costtotal)-parseInt(item_cost);
            $("#total").html('€'+newTotal);  
           
         $(this).parents("tr").remove();
         
});

	$('#form_submit').click(function(){ 
    selectedItemsIds= selectedItemsIds.replace(/\D/g, "");
   
		$("#bookingform").validate({
		
			submitHandler: function(form) {
				
				var form_data = {
                    cost:newTotal,
                    stockitemsids:selectedItemsIds,
                    invoiceid: $('#invoiceid').val(),
                    discount:  $('#discount').val(),
                    invoice:1

					             	
				};
				
				$.ajax({
					url : "<?php echo $config['admin_url'] ?>ajax/modify-invoice.php",
					type :"POST",
					data: form_data,
                    success: function(msg){
                     
                    if(msg == 'done'){

                        $("#form_submit").attr("disabled", true);
                        $("#summary").html('<div class="alert alert-success"><p>Invoice Updated  !</p></div>');
                        setTimeout(function(){
                            window.location.replace("<?= $config['admin_url'] . 'invoice.php' ?>");
                        }, 2000);

                        }else{
                        
                        $("#summary").html('<div class="alert alert-danger"><p>Something Went Wrong ! Please Try Again</p></div>');
                        $("#form_submit").attr("disabled", true);
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
</script>















</body>
</html>