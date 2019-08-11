<?php 
// Include the Header file
require_once('./template/common/header2.php');
// Include the config file
require_once './functions/config.php' ;
// Start the session 
session_start();
if (isset($_SESSION['userid']) AND $_SESSION['usertype'] == 'admin') {
header('Location:' . $config['admin_url'] . 'index.php');
}
?>

<div class="login-box">
  <div class="row">
  <a href="<?php echo $config['url'] ?>">
            <img src="../logo.png" alt="Logo" style="display:block; margin:0 auto;">
          </a>
</div>
<div class="login-logo">
  <a href="<?= $config['url'] ?>"><b><?php echo $config['cms_name'] ?> </a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">Sign in to start your session</p>

  <form method="post" name="loginform" id="loginform">
    <div class="form-group has-feedback">
      <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username">
    </div>
    <div class="form-group has-feedback">
      <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    </div>
  
    <div class="row">
      <div class="col-md-12">
         <p class="error" id="showerror"></p>
      </div>
    </div>
    <div class="row">


      <div class="col-xs-8 hidden-xs">
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" id="login_btn" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  

  <a href="#">Forgot my password</a><br>
 

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- JQuery Js -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- JQueryValidation Js -->
<script src="assets/bower_components/jquery-validation/jqueryvalidate.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $('#login_btn').click(function(){
      $('#loginform').validate({
        rules:{
          username:{
            required: true
          },
          password: {
            required: true
          }
        },
        messages: {
          username: {
            required: "Username is required"
          },
          password: {
            required: "Password is required"
          }

        },
        submitHandler: function(form) {
          var form_data = {
        user: $('#username').val(),
        pass: $('#password').val(), 
        login : '1'
          }
        $.ajax({
        url : "<?php echo $config['admin_url'] ?>ajax/check-login.php",
         type :"POST",
        data: form_data,
        success: function(msg){
       
        if(msg == 'error'){
          $('#showerror').html('Invalid Username or Password!')
        }else{
           window.location.href = "index.php";
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