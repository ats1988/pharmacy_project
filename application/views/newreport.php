<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>next/newreport</title>
 
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
            


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        

<style type="text/css">
body {
background-color: #707070;
}

option {
background-color: #C0C0C0 ;
}

nav{
  
  background-image: url(http://st.depositphotos.com/1907633/3138/i/950/depositphotos_31380901-Abstract-metal-molecules-medical-background.jpg);
}


</style>

 </head>
 <body>

<?php 
    
   $pharmacy_Name_Phone_array = array(
       0=>array('name'=>'assuta','phone'=>'08-537-7688'),
       1=>array('name'=>'kinneret','phone'=>'02-987-1115'),
       2=>array('name'=>'migdal','phone'=>'08-998-4473'),
       3=>array('name'=>'polatka','phone'=>'07-477-2123'),
       4=>array('name'=>'spinoza','phone'=>'09-111-9753')
                              );
  
?>

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

<span class="btn btn-info">Prescription Record Details</span>

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
          <?php echo form_open('next/saveDataforadmin');?>
     <tr>
     <td>
     <input type="text" size="20" id="id_r" name="id_r"  class="form-control input-lg" style="width:250px;" placeholder="Id" 
     value="<?php echo $rw->id;?>" disabled="disabled"
     />
     <!--disabled="disabled"-->
     <?php 
     //foreach($to_do as $important) {
     //   echo "<input type='hidden' id='userid' name='userid_r' value='".$important->id."'/>";
     //}
     ?>
	 </td>
     
     <td>
     <input type="text" size="20" id="email_r" name="email_r"  class="form-control input-lg" style="width:250px;" placeholder="Email" 
     value="<?php echo $rw->email;?>" disabled="disabled"
     />
     </td>
     </tr>

     <tr>
     <td>

     <div class="input-group">
     <span style="background-color:#C0C0C0;" class="input-group-addon">select a user</span>     
     <select value="" id="userselect" name="userselect" class="form-control input-lg btn bstn-default dropdown-toggle" data-toggle="dropdown" style="width:250px;">
     <!--<option value="u">u</option>-->
     <?php foreach($to_do as $dj) {?>
     <?php 
     $display = 'none';
     if($dj->type == 'a')
     { $display = 'none'; }else{ $display = 'display'; }
     
     ?>
     <?php echo "<option style='display:$display;' value='$dj->id'>&nbsp;".strtoupper($dj->username)."</option>";?>
     <?php }?>
     </select>

     </div>
     </td>
     <td>&nbsp;</td>
     <tr>

     <tr>
     <td>
     <input type="text" size="20" id="drug_name" name="drug_name" class="form-control input-lg" style="width:250px;" placeholder="drug name"
     value=""
     />
     </td>
     
     <td>
     <input type="text" id="RX_number" name="rx_number" class="form-control input-lg" style="width:250px;" placeholder="Rx Number"
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
     
     <input type="text" size="20" id="treatmentFor" name="TreatmentFor" class="form-control input-lg" style="width:250px;" placeholder="Treatment for"
     value=""
     />

     </td>
     <td>
     <input type="text" size="20" id="dosage" name="dosage" class="form-control input-lg" style="width:250px;" placeholder="dosage"
     value=""
     />
     </td>
     </tr>

	 <tr>
     <td>
     <div class="input-group">
     <span style="background-color:#C0C0C0;" class="input-group-addon">Pharmacy Name & Phone</span>     
     <select value="" id="pharmacyPart" name="pharmacyPart" class="form-control input-lg btn bstn-default dropdown-toggle" data-toggle="dropdown" style="width:100%;"
     >
          

     <!--<option value="u">u</option>-->
     <?php foreach($pharmacy_Name_Phone_array as $kk => $globl) {?>
     <?php// foreach($global as $k=> $info) {?>   
     <?php echo "<option value='".$globl["name"].'&nbsp;'.$globl["phone"]."'>".strtoupper($globl["name"])."&nbsp;&nbsp;&nbsp;No.&nbsp;".$globl['phone']."</option>";?>
     <?php// }?>
     <?php }?>
     </select>
     <span style="background-color:#C0C0C0;" class="input-group-addon"><img style="height:30px; width:30;" src="http://www.clker.com/cliparts/o/U/E/i/y/f/pharmacy-symbol.svg"/></span>
     </div>
     </td>
     
     <td>
     &nbsp;
	 </td>
     </tr>

     <tr>
	 <td>
     <div class="input-group">
     <span style="background-color:#C0C0C0;" class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
     <input type="text"  id="datepicker" name="refill" class="form-control input-lg" style="width:100%;" placeholder="refill"
     value="" 
     /><span id="clean" style="background-color:#C0C0C0;" class="input-group-addon"> <span class="glyphicon glyphicon-remove-circle"></span> </span>
     </div>    
     </td>
	 <td>
     <textarea  size="250" id="notes" name="notes" class="form-control input-lg" style="width:420px;" placeholder="Notes"
     value=""
     ></textarea>
	 </td>
     </tr>

     <tr>
     <td>
     <input type="submit" value="Save" id="save" name="Save_passTOnewreport" class="btn btn-primary btn-lgv"/>
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

$( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });

$("#clean").click(function () {

    $( "#datepicker" ).val('');
});

});

</script>




</body>
</html>
