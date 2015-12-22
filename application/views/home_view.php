<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
 
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style type="text/css">
nav{
  
  background-image: url(http://st.depositphotos.com/1907633/3138/i/950/depositphotos_31380901-Abstract-metal-molecules-medical-background.jpg);
}

.add{
  background-color: #ddd;
}
</style>
 </head>
 <body>

<?php 

      $split = explode('@', $email);
      $name = $split[0];
      $str_N = strtoupper($name);
      //--------admin user condition
          static $stat,$stat2,$able,$tooltip,$tooltip2,$src,$plus,$Create,$reportTabPage,$colorofcounter,$messages,$onTitle;
          $stat = 'none'; $stat2 = 'none'; $medicalQ = NULL;
          date_default_timezone_set('Asia/Jerusalem');
          $script = "
<script>$(document).ready(function(){
$('#add_user').hide();
});

$('#plus').bind('click',function () {
    $('#add_user').fadeToggle().addClass('add');
});</script>"
;
$colorofcounter = 'black';
if($count == 0)
{
$colorofcounter = 'black'; $messages = 'None Messages';
}else {$colorofcounter = 'red'; $messages = 'New Messages';}
          switch($type)
          {
            case 'a':
          $stat = 'block'; $Create = 'Create new Reporting doc';
          $medicalQ = site_url('next/passTOnewreport/'.$id);
          $reportTabPage = site_url('tables/reportsTABLEpage/'.$id);
          $able='glyphicon glyphicon-eye-open'; $tooltip = 'EDIT users mode'; $tooltip2 = 'ADD new user'; $src = 'http://www.clipartlord.com/wp-content/uploads/2015/04/doctor14.png'; $plus='glyphicon glyphicon-plus';
          $onTitle = "Users's Table /&nbsp;";$stat2 = 'none';
          $script;
            break;
            case 'u':
          $stat = 'none'; $Create = 'Create new medical query';
          $medicalQ = site_url('next/passTOnewdoc/'.$id);
          $reportTabPage = site_url('tables/reportsTABLEpage/'.$id);
          $able='glyphicon glyphicon-eye-close'; $tooltip = 'Cant edit users'; $tooltip2 =  date('H:i:s'); $src= 'http://www.ascendant.com.ph/images/icon/patient.png'; $plus='glyphicon glyphicon-time';
          $onTitle = "Details /&nbsp;";$stat2 = 'block';
          $script = NULL;
            break;
          }

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
        
          <ul class="list-inline">
            <li>
            <a id='envelope' href="<?php echo $reportTabPage;?>" data-toggle="tooltip" data-placement="bottom" title="<?=$messages;?>" class="btn btn-default">
            <span class="glyphicon glyphicon-envelope"></span>&nbsp;<span style='color:<?=$colorofcounter;?>;'><?=$count;?>
            </a>
            </li>

            <li>
            <a id='plus' href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tooltip2;?>" class="btn btn-default">
            <span class="<?php echo $plus;?>"></span>
            </a>
            </li>

            <li> 
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tooltip;?>" class="btn btn-default">
            <span class="<?php echo $able;?>"></span>
            </a>
            </li>

            <li>
            <a href="home/logout" class="btn btn-primary btn-lgv">Logout</a>
            </li>


            <li>
            <a href="#" class="btn btn-warning" disabled="disabled">
            <span style=""> <?php echo $str_N; ?>
            </span>
            </a>
            </li>

            <li>
            <a href="#">
            <img src="<?php echo $src;?>" class="img-circle" alt="Cinque Terre" width="40" height="auto"/>
            </a>
            </li>

          </ul>

    </div>
  </div>
</nav>


<br /><br />


<div id='add_user' style="display:<?php echo $stat;?>;" class="panel-body">
     <form method="post" action="<?php echo site_url('home/savedata');?>">
     <input type="text" size="20" id="email_e" name="email_e"  class="form-control input-lg" style="width:250px;" placeholder="Email"/>
     <br/>
     <input type="password" size="20" id="passowrd_e" name="password_e" class="form-control input-lg" style="width:250px;" placeholder="Password"/>
     <br/>
     <!--<input type="text" id="type_e" name="type_e" class="form-control input-lg" style="width:250px;" placeholder="type"/>-->
     <select id="type_e" name="type_e" class="form-control input-lg  btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:250px;">
     <option value="u">u</option>
     <option value="a">a</option>
     </select>
     <br/><br/>
     <input type="text" id="username_e" name="username_e" class="form-control input-lg" style="width:250px;" placeholder="username"/>
     <br/>
     <input type="submit" value="Save" id="save" class="btn btn-primary btn-lgv"/>
   </form>
</div>
<br /><br />

<span class="well"><?php echo $onTitle."<button class='btn btn-info active'><span class='glyphicon glyphicon-flash'></span>&nbsp;".strtoupper($type)."</button>"?> / <?php echo "<button class='btn btn-info active'><span class='glyphicon glyphicon-user'></span>&nbsp;$name</button>"?>
 / <?php echo "<button class='btn btn-info active'><span class='glyphicon glyphicon-paperclip'></span>&nbsp;$email</button>"?>
</span>
<br /><br />
<div style="display:<?php echo $stat;?>;" class="panel-body">

  <table class="table">
<tr><th>Id</th>
    <th>Email</th>
    <th>Password</th>
    <th>Type</th>
    <th>Delete User</th>
    <th>Edit User</th>
</tr>
  <?php 
  foreach($to_do as $da)
  {
     // echo "||".$da->email."||"."<br />";
    echo "<tr>
    <td>".$da->id."</td><td>".$da->email."</td><td>".$da->password."</td><td>".$da->type."</td>";
    echo "<td>";
    $bttn = "<button class='btn btn-info' data-toggle='tooltip' data-placement='right' title='delete $da->username ?'><span class='glyphicon glyphicon-trash'></span></button>";
    
    echo anchor("/home/delete_row/$da->id", $bttn);
    echo "</td>";
    
    echo "</td><td><a href='".site_url('home/edit/'.$da->id)."' class='btn btn-default' data-toggle='tooltip' data-placement='right' title='edit $da->username'><span class='glyphicon glyphicon-pencil'></span></a></td>
    </tr>";

  }

  ?>
  </table>
 </div>

<br />

<div>
<br />

  <div class="container-fluid" style="border:1px solid grey;">
    <div class="navbar-header">
      <span class="navbar-brand">select one option</span>
    </div>
    <div>
      <ul class="nav navbar-nav">
        
        <li><a href="<?php echo $medicalQ; ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo $Create;?>"><span class="glyphicon glyphicon-edit"></span></a></li>
        
        <!--<li><a href="<?php echo $reportTabPage;?>" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;<span style='color:red;'><?=$count;?></span></a></li>-->

        <li><a href="#" class="btn btn-default"><span class="glyphicon glyphicon-tasks"></span></a></li>
      
      </ul>
    </div>
    <div class="btn-group pull-right">
         <ul class="nav navbar-nav">
        
        <li>

     <!--<form method="post" action="<?php echo site_url('../index.php/home'); ?>">-->
     <select style="display:<?=$stat2;?>; width:250px;" id="sort" name="type_e" class="form-control input-lg  btn btn-default dropdown-toggle" data-toggle="dropdown">
     <!--<optgroup label="Please make a choice">-->
     <option  value="0">SELECT AN OPTION</option>
     <option value="1">   
     Edit Profile
     </option>
     <!--</optgroup>-->
     </select>
     <!--<noscript><input type="submit" value="Submit"></noscript>-->
     <!--</form>-->

        </li>
         <!--onchange='this.form.submit()'-->

      
      </ul>
    </div>
  </div>

</div>







<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Edit Profile</h4>
      </div>
      <div class="modal-body">
          <?php echo form_open('home/updateOnDialog/'.$dialog->id);?>
          <div class="form-group">

     <input type="text" size="20" id="id_e" name="id_e"  class="form-control input-lg" style="width:250px;" placeholder="Email" 
     value="<?php echo $dialog->id;?>" disabled="disabled"
     />
     <br />
     <input type="text" size="20" id="email_e" name="email_e"  class="form-control input-lg" style="width:250px;" placeholder="Email" 
     value="<?php echo $dialog->email;?>"
     />
     <br/>
     <input type="password" size="20" id="passowrd_e" name="password_e" class="form-control input-lg" style="width:250px;" placeholder="Password"
     value="<?php echo $dialog->password;?>"
     />
     <br/>
     <input type="text" id="username_e" name="username_e" class="form-control input-lg" style="width:250px;" placeholder="username"
     value="<?php echo $dialog->username;?>"
     />
     <br/>
     <br/>

     <button type="submit" id="save" name="Save" class="btn btn-primary btn-lgv">Save&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span></button>

      
     </div>
          
      
    <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>










<?php echo $script;?>
 <script type="text/javascript">

/*
 function OpenModal()
 {
  var dialogId = $('#exampleModal');
    dialogId.dialog({
      modal: true,
      autoOpen: false
    });

    $('select').change(function (){
       if($(this).val() == "1"){
        dialogId.dialog('open');
       }
    });
 }
*/

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
/*#add_user*/
    //$('#add_user').hide();

    $('[data-toggle="popover"]').popover();   




  //$("#myModal").modal('show');


});

//$('#plus').click(function () {
  //  $('#add_user').toggle();
//});


  $('#sort').change(function() {
    if ($(this).val() === '1') {
        $("#exampleModal").modal('show').fadeIn(650);
    }
    else{
      //
    }
});

 </script>

 </body>
</html>