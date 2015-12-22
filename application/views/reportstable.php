<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>tables/reportstable</title>
 
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
            


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

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

<?php 


      $splt = explode('@', $email);
      $name = $splt[0];


?>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pharmacy Reporting System</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('../index.php/home');?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
        <li><a href="#"><span><span class="glyphicon glyphicon-envelope"></span> <?=$count;?></span></a></li>
      </ul>
    </div>
    <div class="btn-group pull-right">

<span class="btn btn-info active">tables/reportstable</span>

    </div>
  </div>
</nav>


<br />

<div class="panel-body">
<span class="well">Reports's Table / <?php echo "<button class='btn btn-warning active'><span class='glyphicon glyphicon-flash'></span>&nbsp;".strtoupper($type)."</button>"?> / <?php echo "<button class='btn btn-warning active'><span class='glyphicon glyphicon-user'></span>&nbsp;$name</button>"?>
 / <?php echo "<button class='btn btn-warning active'><span class='glyphicon glyphicon-paperclip'></span>&nbsp;$email</button>"?>
</span>
<br /><br />

<span class="well" style="float:left; width:465px;">
  <div class="input-group"> <span class="input-group-addon">Filter</span>

    <input id="filter" type="text" class="form-control" placeholder="Type here...">
  </div>
</span>

<br /><br /><br />
  <table class="table table-bordered">
<thead>
<tr><!--<th>ReportId</th>
    <th>RportUserId</th>
    <th>Surname</th>
    <th>Address</th>
    <th>Post Code</th>
    <th>Gender</th>
    <th>Height</th>
        <th>weight</th>
            <th>smoking</th>
                <th>beingTreated</th>
                    <th>Receiving</th>
                    <th>Download PDF</th>-->
                    <th><img src="https://cdn0.iconfinder.com/data/icons/officy/32/mail-open-128.png" style="width:20px; height:20px;" /></th>
                    <th>ReportId</th>
                    <th>Surname</th>
                    <th>RportUserId</th>
                    <th>Show All Details</th>
                    <th>Remove</th>

</tr>
</thead>
  <?php 
  //$_SESSION["counter"] = 0;
  $_SESSION['arr'] = [];
  foreach($rw as $key => $r)
  {

    $key += 1;
    //$_SESSION["counter"] = count($rw);
    //$count = count($rw);
    echo "<tbody class='searchable'>";
    echo "<tr>";
    echo "<td><button class='btn btn-warning btn-sm'>".$key."</button></td>";
    echo "<td><div>$r->reportId</div></td>";
    echo "<td><div>$r->surname</div></td>";
    echo "<td><div>$r->id</div></td>";
    
    $_SESSION['arr'] = $r;

    echo "<td>     
    <form method='post' action='".site_url('tables/passTOsolo/'.$id."/".$_SESSION['arr']->reportId)."'>";     
    ?>

    <input type='hidden' name='input_name' value="<?php echo htmlentities(serialize($_SESSION['arr'])); ?>" />

    <?php
    echo
    "<input type='submit' name='sub' id='$r->id' class='btn btn-warning btn-sm active glyphicon glyphicon-th-list' value='Details'/>
    </form>
    </td>";
    //<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Register</button>
    // onclick="<?php $coverid = $row['coverid']"
    /*echo "<td>".$r->reportId."</td>";
    echo "<td>".$r->id."</td>";
    echo "<td>".$r->surname."</td>";
    echo "<td>".$r->address."</td>";
    echo "<td>".$r->postcode."</td>";
    echo "<td>".$r->gender."</td>";
    echo "<td>".$r->height."</td>";
    echo "<td>".$r->weight."</td>";
    echo "<td>".$r->smoking."</td>";
    echo "<td>".$r->beingTreated."</td>";
    echo "<td>".$r->receiving."</td>";
    echo "<td><a href='#'><img src='http://www.hawkerrichardson.com.au/images/supplier_logo/pdf_Button.jpeg' style='width:20px; height:30px; position:relative; left:35%;' /></a></td>";
    */
    /*
    if(isset($_POST['sub']))
    {
      $_SESSION['arr'];
    }
    */
    echo "<td>";
    $bttn = "<button class='btn btn-warning active' data-toggle='tooltip' data-placement='right' title='delete $r->surname ?'><span class='glyphicon glyphicon-trash'></span></button>";
    
    echo anchor("/tables/delete_row/$type/$r->reportId", $bttn);
    echo "</td>";
    echo "</tr>";
    echo "</tbody>";
  }

  ?>
  </table>
  <br />
 </div>


<br />


 <?php 
 //echo "<br />count_unreal_session : <input type='text' disabled='disabled' value='".$_SESSION["counter"]."' style='width:28px;'/>";
 //echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;count_real_session : <input type='text' disabled='disabled' value='$count' style='width:28px;'/>";
 ?>

<script type="text/javascript">

$(document).ready(function() {

  $('[data-toggle="tooltip"]').tooltip(); 



    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));


});

</script>




</body>
</html>
