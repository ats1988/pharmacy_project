<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>tables/replytable</title>
 
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

<span class="btn btn-info">tables/replytable</span>

    </div>
  </div>
</nav>


<br />

<div class="panel-body">
<span class="well">Reply's Table / <?php echo "<button class='btn btn-warning active'><span class='glyphicon glyphicon-flash'></span>&nbsp;".strtoupper($type)."</button>"?> / <?php echo "<button class='btn btn-warning active'><span class='glyphicon glyphicon-user'></span>&nbsp;$name</button>"?>
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
<tr>
    <th><img src="https://cdn0.iconfinder.com/data/icons/officy/32/mail-open-128.png" style="width:20px; height:20px;" /></th>
    <th>ReplyId</th>
    <th>Reply Username</th>
    <th>Reply user Id</th>
    <th>Drug Name</th>
    <th>Show All Details</th>
    <th>Remove</th>
    <!--<th>Rx Number</th>
    <th>Treatment For</th>
    <th>Dosage</th>
        <th>Pharmacy Name & Phone</th>
            <th>Refill</th>
                <th>Notes</th>-->
</tr>
</thead>
  <?php 
  $_SESSION['arr'] = [];
  foreach($rw as $key => $r)
  {
    /*echo "<tr>
    <td>".$r->replyId."</td><td>".$r->id."<br /></span>DR $r->username"."</td><td>".$r->userSelection."</td><td>".$r->drugName."</td><td>".$r->RxNumber."</td>";
    echo "<td>".$r->treatmentFor."</td><td>".$r->dosage."</td><td>".$r->PharmacyNameandPhone."</td><td>".$r->refill."</td>";
    echo "
    <td>".$r->notes."</td>";

    echo "</tr>";*/

    $key += 1;
    //$_SESSION["counter"] = count($rw);
    //$count = count($rw);
    echo "<tbody class='searchable'>";
    echo "<tr>";
    echo "<td><button class='btn btn-warning btn-sm active'>".$key."</button></td>";
    echo "<td><div>$r->replyId</div></td>";
    echo "<td><div>DR $r->username</div></td>";
    echo "<td><div>$r->replyuserId</div></td>";
    echo "<td><div>$r->drugName</div></td>";

    $_SESSION['arr'] = $r;

    echo "<td>     
    <form method='post' action='".site_url('tables/passTOsolo2/'.$id."/".$_SESSION['arr']->replyId)."'>";     
    ?>

    <input type='hidden' name='input_name' value="<?php echo htmlentities(serialize($_SESSION['arr'])); ?>" />

    <?php
    echo
    "<input type='submit' name='sub' id='$r->id' class='btn btn-warning btn-sm active glyphicon glyphicon-th-list' value='Details'/>
    </form>
    </td>";


    echo "<td>";
    $bttn = "<button class='btn btn-warning active' data-toggle='tooltip' data-placement='right' title='delete $r->replyId ?'><span class='glyphicon glyphicon-trash'></span></button>";
    
    echo anchor("/tables/delete_row/$type/$r->replyId", $bttn);
    echo "</td>";
    echo "</tr>";
    echo "</tbody>";
  }

  ?>
  </table>
  <br />
 </div>

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
