<?php
// Include the config file
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['customerid']) AND ($_SESSION['usertype'] != 'customer')) {
	header('Location:' . $config['admin_url'] . 'customer-login.php');
  }

// Include the config file
require_once('./functions/functions.php');

// Include the Header file
require_once('./template/common/cus-header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Booking
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $config['admin_url'] ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $config['admin_url'] . 'add-booking.php' ?> ">Add Booking</a></li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Booking</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">

        <div class="row">
        <div class="col-md-8">

        <form  id="bookingform" name="bookingform">

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="bookingdate">Booking Date*</label>
						<div class='input-group date' id='bookingdate' name="bookingdate">
							<input data-format="yyyy-MM-dd" type="text" class="form-control" name="bookingdate1" id="bookingdate1"></input>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar">
								</span>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="servicetype">Service Type*</label>
						<select class="form-control" id="servicetype" name="servicetype">
							<option value="">Choose Service</option>
							<?php
							$sql = "SELECT * FROM `service`";
							$result = $check->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) { ?>
									<option value='<?= $row['service_id']  ?>' cost='<?= $row['cost']  ?>'> <?= $row['name'] ?> </option>
								<?php    }
							}  mysqli_close($check); ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="vehiclename">Vehicle Name*</label>
						<select name="vehiclename" id="vehiclename"  class="form-control">
							<option value="">Select Vehicle</option>
							<option value="2cv">2CV</option>
							<option value="600">600</option>
							<option value="Avanti">Avanti</option>
							<option value="Classic">Classic</option>
							<option value="Corvair">Corvair</option>
							<option value="Corvette">Corvette</option>
							<option value="E-series">E-series</option>
							<option value="Fillmore">Fillmore</option>
							<option value="FleetWood">FleetWood</option>
							<option value="Galaxie">Galaxie</option>
							<option value="GTO">GTO</option>
							<option value="Imperial">Imperial</option>
							<option value="Mini">Mini</option>
							<option value="Mini Copper">Mini Copper</option>
							<option value="Minx Magnificent">Minx Magnificent</option>
							<option value="Mutang">Mutang</option>
							<option value="Tempest">Tempest</option>
							<option value="Thunderbird">Thunderbird</option>
						</select>
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="vehiclemake">Vehicle Make*</label>
						<select  class="form-control" id="vehiclemake" name="vehiclemake" >
							<option value="">Car Make</option>
							<option value="alfa romeo">Alfa Romeo</option>
							<option value="asia">Asia</option>
							<option value="aston martin">Aston Martin</option>
							<option value="audi">Audi</option>
							<option value="bentley">Bentley</option>
							<option value="bmw">BMW</option>
							<option value="buick">Buick</option>
							<option value="cadillac">Cadillac</option><option value="chery">Chery</option>
							<option value="chevrolet">Chevrolet</option>
							<option value="chrysler">Chrysler</option><option value="citroen">Citroen</option>
							<option value="daewoo">Daewoo</option>
							<option value="daihatsu">Daihatsu</option><option value="dodge">Dodge</option>
							<option value="ferrari">Ferrari</option>
							<option value="fiat">Fiat</option>
							<option value="ford">Ford </option>
							<option value="foton">Foton</option>
							<option value="geely">Geely</option>
							<option value="gmc">GMC</option>
							<option value="great wall">Great Wall</option>
							<option value="haval">Haval</option><option value="hino">Hino</option>
							<option value="holden">Holden</option>
							<option value="honda">Honda</option>
							<option value="hsv">HSV</option>
							<option value="hummer">Hummer</option>
							<option value="hyundai">Hyundai</option>
							<option value="infiniti">Infiniti</option>
							<option value="isuzu">Isuzu</option>
							<option value="iveco">Iveco</option>
							<option value="jaguar">Jaguar</option>
							<option value="jeep">Jeep</option>
							<option value="kia">Kia</option>
							<option value="lamborghini">Lamborghini</option>
							<option value="lancia">Lancia</option>
							<option value="land rover">Land Rover </option>
							<option value="ldv">LDV</option>
							<option value="lexus">Lexus</option>
							<option value="lincoln">Lincoln</option>
							<option value="mahindra">Mahindra</option>
							<option value="maserati">Maserati</option>
							<option value="mazda">Mazda</option>
							<option value="mclaren">Mclaren (12)</option>
							<option value="mercedes-benz">Mercedes-Benz</option>
							<option value="mg">MG</option>
							<option value="mini">Mini</option>
							<option value="mitsubishi">Mitsubishi</option>
							<option value="nash">Nash</option>
							<option value="nissan">Nissan</option>
							<option value="oldsmobile">Oldsmobile</option>
							<option value="opel">Opel</option>
							<option value="peugeot">Peugeot</option>
							<option value="pontiac">Pontiac</option>
							<option value="porsche">Porsche</option>
							<option value="ram">Ram</option>
							<option value="range rover">Range Rover</option>
							<option value="renault">Renault</option>
							<option value="rolls-royce">Rolls-Royce</option>
							<option value="rover">Rover </option>
							<option value="saab">Saab</option>
							<option value="seat">Seat</option>
							<option value="skoda">Skoda</option>
							<option value="smart">Smart</option>
							<option value="ssangyong">Ssangyong</option>
							<option value="subaru">Subaru</option>
							<option value="sunbeam">Sunbeam</option>
							<option value="suzuki">Suzuki</option>
							<option value="tesla">Tesla</option>
							<option value="toyota">Toyota</option>
							<option value="triumph">Triumph</option>
							<option value="vauxhall">Vauxhall</option><option value="volkswagen">Volkswagen</option>
							<option value="volvo">Volvo</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="vehicleyear">Vehicle year*</label>
						<select name="vehicleyear" id="vehicleyear"  class="form-control">
							<option value="">Vehicle year</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
							<option value="1989">1989</option>
							<option value="1988">1988</option>
							<option value="1987">1987</option>
							<option value="1986">1986</option>
							<option value="1985">1985</option>
							<option value="1984">1984</option>
							<option value="1983">1983</option>
							<option value="1982">1982</option>
							<option value="1981">1981</option>
							<option value="1980">1980</option>
							<option value="1979">1979</option>
							<option value="1978">1978</option>
							<option value="1977">1977</option>
							<option value="1976">1976</option>
							<option value="1975">1975</option>
							<option value="1974">1974</option>
							<option value="1973">1973</option>
							<option value="1972">1972</option>
							<option value="1971">1971</option>
							<option value="1970">1970</option>
							<option value="1969">1969</option>
							<option value="1968">1968</option>
							<option value="1967">1967</option>
							<option value="1966">1966</option>
							<option value="1965">1965</option>
							<option value="1964">1964</option>
							<option value="1963">1963</option>
							<option value="1962">1962</option>
							<option value="1961">1961</option>
							<option value="1960">1960</option>
							<option value="1959">1959</option>
							<option value="1958">1958</option>
							<option value="1957">1957</option>
							<option value="1956">1956</option>
							<option value="1955">1955</option>
							<option value="1954">1954</option>
							<option value="1953">1953</option>
							<option value="1952">1952</option>
							<option value="1951">1951</option>
							<option value="1950">1950</option>
							<option value="1949">1949</option>
							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
							<option value="1944">1944</option>
							<option value="1943">1943</option>
							<option value="1942">1942</option>
							<option value="1941">1941</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="licenseno">License Plate number*</label>
						<input type="text" class="form-control" id="licenseno" name="licenseno" aria-describedby="licenseno" placeholder="Enter License Number">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="enginetype">Vehicle Engine type*</label>
						<select name="enginetype" id="enginetype"  class="form-control">
							<option value="">Select Engine</option>
							<option value="diesel">Diesel</option>
							<option value="petrol">Petrol</option>
							<option value="hybrid">Hybrid</option>
							<option value="electric">Electric</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="vehicletype">Vehicle type*</label>
						<select name="vehicletype" id="vehicletype"  class="form-control">
							<option value="">Select Vehicle Type</option>
							<option value="car">Car</option>
							<option value="motorbike">Motorbike</option>
							<option value="van">Van</option>
							<option value="truck">Truck</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="additionalmsg">Description of Problem</label>
						<textarea class="form-control" id="additionalmsg" name="additionalmsg" rows="3"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="summary" class="error"></div>
					<br/>
					<button type="submit" id="form_submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>


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

<script src="assets/bower_components/jquery/dist/jquery-v1.12.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- JQueryValidation Js -->
<script src="assets/bower_components/jquery-validation/jqueryvalidate.min.js"></script>
<!-- DatePicker Js -->
<script src="assets/bower_components/bootstrap-datetimepicker/js/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>



<!-- Form Validation -->
<script>
$(document).ready(function(){

	$(function () {
		$('#bookingdate').datetimepicker({
			daysOfWeekDisabled: [0],
			format: 'L'
		});
		$('#bookingdate').data("DateTimePicker").minDate(new Date());
		$('#bookingdate').data("DateTimePicker").format('YYYY-MM-DD');

	});

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


				licenseno:{
					required: true
				},
				bookingdate1:{
					required: true
				},
				servicetype:{
					required: true
				},
				vehiclename:{
					required: true
				},
				vehiclemake:{
					required: true
				},
				vehicleyear:{
					required: true
				},
				enginetype:{
					required: true
				},
				vehicletype:{
					required: true
				}

			},
			messages:{


				licenseno:{
					required: "License no required*"
				},
				servicetype:{
					required: "Service Type required*"
				},
				vehiclename:{
					required: "Vehicle Name required*"
				},
				vehiclemake:{
					required: "Vehicle Make required*"
				},
				vehicleyear:{
					required: "Vehicle Year required*"
				},
				enginetype:{
					required: "Vehicle Engine Type required*"
				},
				vehicletype:{
					required: "Vehicle Type required*"
				},
				bookingdate1:{
					required: "Booking Date required*"
				}



			},
			invalidHandler: function() {
				$( "#summary" ).text( $( "#bookingform" ).validate().numberOfInvalids() + " field(s) are invalid" );
			},
			submitHandler: function(form) {

				var form_data = {
					customer_id: <?= $_SESSION['customerid'] ?>,
					servicetype: $('#servicetype').val(),
					vehiclename: $('#vehiclename').val(),
					vehiclemake: $('#vehiclemake').val(),
					vehicleyear: $('#vehicleyear').val(),
					licenseno: $('#licenseno').val(),
					enginetype: $('#enginetype').val(),
					vehicletype: $('#vehicletype').val(),
					additionalmsg: $('#additionalmsg').val(),
					booking: 1,
					bookingdate: $("#bookingdate").find("input").val(),
					bookingcost: $('#servicetype option:selected').attr('cost')
				};
				$.ajax({
					url : "<?php echo $config['admin_url'] ?>ajax/add-booking-for-customer.php",
					type :"POST",
					data: form_data,
					success: function(msg){
						if(msg == 'bookingerror'){
                            $("#summary").html('<div class="alert alert-danger"><p>Something Went Wrong ! Please Try Again !</p></div>');
							$("#form_submit").attr("disabled", true);
							setTimeout(function(){
                                window.location.href = 'add-booking.php';
							}, 2000);
						}else{

							$("#form_submit").attr("disabled", true);
                            $("#summary").html('<div class="alert alert-success"><p>Booking Added Successfully !</p></div>');
							setTimeout(function(){
								window.location.href = 'index3.php';
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
