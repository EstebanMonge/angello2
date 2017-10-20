<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Angello IP Management</title>
    <link rel="stylesheet" href="<?php echo base_url()?>css/reset.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/style.css">
  </head>
  <body>
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Angello IP Management</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
                <?php
    	          $success_msg= $this->session->flashdata('success_msg');
        	  $error_msg= $this->session->flashdata('error_msg');
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>
    <form action="<?php echo base_url()?>index.php/login/login_user" method="post">
      <input id="username" name="username" type="text" placeholder="Username"/>
      <input id="password" name="password" type="password" placeholder="Password"/>
      <button>Login</button>
    </form>
  </div>
</div>
  </body>
</html>
