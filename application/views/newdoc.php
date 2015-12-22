<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>next/newdoc</title>
 
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
body {
background-color: #708090;
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
        <!--<li><a href="#">Page 2</a></li>-->
      </ul>
    </div>
    <div class="btn-group pull-right">

<span class="btn btn-info">Medical Questionnaire</span>

    </div>
  </div>
</nav>



<!--<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
-->


<br />

<div class="panel-body">
     <!--<form method="post" action="<?php echo site_url('home/update');?>">-->
     
     <?php if(validation_errors()):?>
    <div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo validation_errors(); ?></strong>
    </div>
  <?php endif;?>

     <table class="table">
          <?php echo form_open('next/saveDataforuser');?>
     <tr>
     <td>
     <input type="text" size="20" id="id_n" name="id_n"  class="form-control input-lg" style="width:250px;" placeholder="Id" 
     value="<?php echo $rw->id;?>" disabled="disabled"
     />
     <!--disabled="disabled"-->
	 </td>
     
     <td>
     <input type="text" size="20" id="email_n" name="email_n"  class="form-control input-lg" style="width:250px;" placeholder="Email" 
     value="<?php echo $rw->email;?>" disabled="disabled"
     />
     </td>
     </tr>

     <tr>
     <td>
     <input type="text" size="20" id="surname" name="surname" class="form-control input-lg" style="width:250px;" placeholder="surname"
     value=""
     />
     </td>
     
     <td>
     <input type="text" size="20" id="address" name="address" class="form-control input-lg" style="width:250px;" placeholder="address"
     value=""
     />
     <!--<br/>
     <input type="text" id="type_e" name="type_e" class="form-control input-lg" style="width:250px;" placeholder="type"
     value="<?php echo $r->type;?>"
     />-->
	 </td>
     </tr>

     <tr>
     <td>
     <input type="text" id="post_code" name="post_code" class="form-control input-lg" style="width:250px;" placeholder="post code"
     value=""
     />
     </td>
     <td>
     
     <input type="checkbox" name="gender" value="male" class="" />Male
  	 <input type="checkbox" name="gender" value="female" class="" />Female
	 	
     </td>
     </tr>

	 <tr>
     <td>
     <div class="input-group">
     <input type="text" size="20" id="height" name="height" class="form-control input-lg" style="" placeholder="Height"
     value=""
     /><span class="input-group-addon">CM</span>
 	 </div>
     </td>
     
     <td>
     <div class="input-group">
     <input type="text" size="20" id="weight" name="weight" class="form-control input-lg" style="" placeholder="Weight"
     value=""
     /><span class="input-group-addon">KG</span>
     </div>
	 </td>
     </tr>

     <tr>
	 <td>
     <input type="text" id="office_use" name="office_use" class="form-control input-lg" style="" placeholder="Office Use BMI = "
     value="" disabled="disabled"
     />
     </td>
	 <td>

     <span class="input-group-addon">Smoking</span>
  	 <input name="smoking" type="checkbox" value="Never" class="btn btn-info" />Never
  	 <input name="smoking" type="checkbox" value="Currently" class="btn btn-info" />Currently
  	 <input name="smoking" type="checkbox" value="Quit" class="btn btn-info" />Quit
  	 <input name="smoking" type="checkbox" value="Age Started"class="btn btn-info" />Age Started
	 
	 </td>
     </tr>

     <tr>
     <td>

     <div>
     	<span class="input-group-addon">Are you currently being treated by a doctor<br /> or health proffessional for any illness or injury ?</span>
     <input type="checkbox" name="being_treated" value="yes" class="btn btn-primary" />Yes
  	 <input type="checkbox" name="being_treated" value="no" class="btn btn-primary" />No
	 	<textarea  size="250" id="beingtreated" name="being_treated_if_yes" class="form-control input-lg" style="width:450px;" placeholder="if Yes, provide details"
     value=""
     ></textarea >
  	 
	 </div>

	 </td>

	 <td>

     <div>
     	<span class="input-group-addon">Are you currently receiving any<br /> medical treatment or taking mediaction ?</span>
     <input type="checkbox" name="receiving" value="yes" class="btn btn-primary" />Yes
  	 <input type="checkbox" name="receiving" value="no" class="btn btn-primary" />No
	 	<textarea  size="250" id="receiving" name="receiving_if_yes" class="form-control input-lg" style="width:450px;" placeholder="if Yes, provide details"
     value=""
     ></textarea >
  	 
	 </div>

	 </td>
	 </tr>
     
     <tr>
     <td>
     <input type="submit" value="Save" id="save" name="Save_passTOnewdoc" class="btn btn-primary btn-lgv"/>
     </td>
     </tr>

     <?php echo form_close();?>
     <br />
</div>

<script type="text/javascript">

$(document).ready(function() {
$("input:checkbox").click(function() {
    if ($(this).is(":checked")) {
        var group = "input:checkbox[name='" + $(this).attr("name") + "']";
        $(group).prop("checked", false);
        $(this).prop("checked", true);
    } else {
        $(this).prop("checked", false);
    }
});

});

</script>


</body>
</html>
