
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
 
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
body {
background-color: #707070;
}

th{
  background-image: url(http://www.firstaidservicesandtraining.org.uk/wp-content/uploads/2015/02/medical-background.jpg);
  color:white;
}

nav{

  background-image: url(http://st.depositphotos.com/1907633/3138/i/950/depositphotos_31380901-Abstract-metal-molecules-medical-background.jpg);
}


</style>
 </head>
 <body>
   
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pharmacy Reporting System</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('../index.php/home');?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
      </ul>
    </div>
    <div class="btn-group pull-right">

<span class="btn btn-info">tables/solo</span>

    </div>
  </div>
</nav>

<br />

<div class="panel-body">
     <!--<form method="post" action="<?php echo site_url('home/update');?>">-->
          <?php echo form_open('home/update/'.$r->id);?>
     <input type="text" size="20" id="id_e" name="id_e"  class="form-control input-lg" style="width:250px;" placeholder="Email" 
     value="<?php echo $r->id;?>" disabled="disabled"
     />
     <br />
     <input type="text" size="20" id="email_e" name="email_e"  class="form-control input-lg" style="width:250px;" placeholder="Email" 
     value="<?php echo $r->email;?>"
     />
     <br/>
     <input type="password" size="20" id="passowrd_e" name="password_e" class="form-control input-lg" style="width:250px;" placeholder="Password"
     value="<?php echo $r->password;?>"
     />
     <br/>
     <select value="<?php echo $r->type;?>" id="type_e" name="type_e" class="form-control input-lg btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:250px;">
     <option value="u">u</option>
     <option value="a">a</option>
     </select>
     <!--<br/>
     <input type="text" id="type_e" name="type_e" class="form-control input-lg" style="width:250px;" placeholder="type"
     value="<?php echo $r->type;?>"
     />-->
     <br/>
     <br/>
     <input type="text" id="username_e" name="username_e" class="form-control input-lg" style="width:250px;" placeholder="username"
     value="<?php echo $r->username;?>"
     />
     <br/>
     <button type="submit" id="save" name="Save" class="btn btn-primary btn-lgv">Save&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span></button>
     <br/>
     <?php echo form_close();?>
</div>

</body>
</html>