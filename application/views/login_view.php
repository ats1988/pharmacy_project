<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 
   
 </head>
 <body>
  
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pharmacy Reporting System</a>
    </div>
    <div class="btn-group pull-right">
    <ul class="list-inline">

    <li>
    <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="custom services No. +972-535329807 email: avivtsfira@gmail.com">
    <span class="glyphicon glyphicon-phone-alt"></span>
    </a>
    </li>

    <li>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Register</button>
    </li>


    </ul>
    </div>
  </div>
</nav>

    <div class="panel-body">
  
  <?php if(validation_errors()):?>
    <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo validation_errors(); ?></strong>
    </div>
  <?php endif;?>

   <?php echo form_open('verifylogin'); ?>
     <label for="email">Email:</label>
     <input type="text" size="20" id="email_1" name="email"  class="form-control input-lg" style="width:250px;" placeholder="Email" />
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password" class="form-control input-lg" style="width:250px;" placeholder="Password"/>
     <input type="hidden" size="20" id="type" name="type_1"  placeholder="type"/>
     <br/>
     <input type="submit" value="Login" id="LLogin" class="btn btn-primary btn-lgv"/>
     <button type="reset" value="Reset"  class="btn btn-primary">Reset</button>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="loading"></div>
   <?php echo form_close();?>
</div>
<br />
<div class="panel-body">


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Registration</h4>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('verifyregister/do_register')?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email2" placeholder="Email" />
           <br />
            <input type="text" id="passowrd_for" class="form-control" name="password2" placeholder="Password"/>
     		<input type="hidden" id="username_for" name="username" value=""/>
             <input type="hidden" size="20" id="type" name="type"  placeholder="type" value='u'/>

            <br /><label for="recipient-name" class="control-label" style="color:brown;">a password will send to your email after<br /> you will click on the submit button</label>

          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="register" value="register" id="register" class="btn btn-primary"/>
      </div>
		<?php echo form_close();?>
      </div>
    </div>
  </div>
</div>



 <script type="text/javascript">

    $('#email_1').autocomplete({
          source: "<?php echo site_url('login/search/?');?>"  
      }); 

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
/*#add_user*/
    //$('#add_user').hide();
});

//$('#plus').click(function () {
  //  $('#add_user').toggle();
//});
    </script>

</div>

 </body>
</html>


<script>

$("input[value='Send']").text('Send');

/*$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('whatever'); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text('Registration' + recipient);
  modal.find('.modal-body input').val(recipient);
});*/


$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
   
});

window.onload = function () {

$('#LLogin,#register').click(function () {
    // add loading image to div

    $('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif" /> loading...');
    
    // run ajax request
    $.ajax({
        type: "GET",
        //dataType: "json",
        //url: "https://api.github.com/users/jveldboom",
        success: function () {
            
            setTimeout(function () {
                $('#loading').html('<img src="' + img_src + '" /><br>');
            }, 1000);
        }
    });

});

}

/*
$('button[name="send"]').click(function () {

    $('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif" /> loading...');
    
    // run ajax request
    $.ajax({
        type: "post",
        
        success: function () {
            alert("aviv tsfira");
        }
    });

});
*/

</script>
<?php 
/*if(isset($_POST["register"]))
{
	header("Location:success.php");
}*/
?>