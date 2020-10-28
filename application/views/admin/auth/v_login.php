<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIPER-RM | <?php echo $title; ?></title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/template_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/template_admin/bower_components/font-awesome/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script src="<?php echo base_url();?>assets/template_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>assets/template_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
<style type="text/css">
  .login-form {
    width: 340px;
    margin: 50px auto;
  }
    .login-form form {        
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
  .input-group-addon .fa {
        font-size: 18px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="<?php echo base_url('authlogin/auth'); ?>" method="post">
        <h2 class="text-center">Log in</h2>   
        <div class="form-group">
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="fusername" value="<?php echo set_value('fusername');?>" class="form-control" placeholder="Username">
          </div>
          <span class="text-danger"><?php echo form_error("fusername");?></span>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="fpassword" value="<?php echo set_value('fpassword');?>" class="form-control" placeholder="Password">
            </div>
            <span class="text-danger"><?php echo form_error("fpassword");?></span>
        </div>
        <center><span class="text-danger"><?php echo $this->session->flashdata('msg');?></span></center>     
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">LOG IN</button>
        </div>
              
    </form>
    <p class="text-center small">SIPER-RM <a href="http://rswijayakusuma.com/" target="_blank" style="text-decoration: none;"> PKM JENGGAWAH</a></p>
</div>
</body>
</html>                            
