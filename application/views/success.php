<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
 
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">

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
  sleep(2);
  //header("Location:login_view.php");
  
  ?><br />
   

  <br /><br /><br />
  <div class="panel-body">
  <span class="well">Authentication Details Table</span>

  <br /><br /><br />
  <table class="table table-bordered">
    <tr>
    <th>Username</th>
    <th>Password</th>
    <th>Back To Login Page</th>
    
    <!--<th>Rx Number</th>
    <th>Treatment For</th>
    <th>Dosage</th>
        <th>Pharmacy Name & Phone</th>
            <th>Refill</th>
                <th>Notes</th>-->
    </tr>
  <?php 
    echo "<tr>";
    
    echo "<td>".$for_succ['user_email']."</td>";
    echo "<td>".$for_succ['user_password']."</td>";
    echo "<td><a class='btn btn-info' href='".base_url()."'>main page</a></td>";

    echo "</tr>";


  ?>
  </table>
  <br />
  </div>



 </body>
</html>