<?php 
//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>tables/solo</title>
 
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>





<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>



<style type="text/css">
body {
background-color: #707070;
}

th{
  background-image: url(http://www.firstaidservicesandtraining.org.uk/wp-content/uploads/2015/02/medical-background.jpg);
  color:white;
}
td{text-align: center;}

nav{

  background-image: url(http://st.depositphotos.com/1907633/3138/i/950/depositphotos_31380901-Abstract-metal-molecules-medical-background.jpg);
}


</style>
 </head>
 <body>

<?php 
$back_to = site_url('tables/reportsTABLEpage/'.$id);
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pharmacy Reporting System</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('../index.php/home');?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
        <li><a href="<?php echo $back_to;?>"><span class="glyphicon glyphicon-arrow-left"></span></a></li>

      </ul>
    </div>
    <div class="btn-group pull-right">
    <ul class="nav navbar-nav">

    <li>
    <button id="button1" data-toggle='tooltip' data-placement='bottom' title='create a pdf file' class="btn btn-info active">convert to pdf&nbsp;<img src="http://www.guidingtech.com/assets/postimages/2014/02/logo-adobe-pdf.jpg" style="width:20px; height:30px;"/></button>&nbsp;
    </li>

    <li><span class="btn btn-info">tables/solo</span></li>
    </ul>
    </div>
  </div>
</nav>


   
<br />


<?php 

global $content,$pssd_array;

?>
                    


  <?php 
  //$_SESSION["counter"] = 0;
      
  global $content,$pssd_array;
    
    $pssd_array = unserialize($_POST['input_name']);

    //$_SESSION["counter"] = count($rw);
    //$count = count($rw);
    //echo "<form action='.' method='post'>";
    

    $content =  "<div class='panel-body'>
    <table id='table-id' class='table table-bordered'><tr><th>ReportId</th><td>$pssd_array->reportId</td></tr>
    <tr><th>Id</th><td>$pssd_array->id</td></tr>
    <tr><th>Surname</th><td>$pssd_array->surname</td></tr>
    <tr><th>Address</th><td>$pssd_array->address</td></tr>
    <tr><th>Post Code</th><td>$pssd_array->postcode</td></tr>
    <tr><th>Gender</th><td>$pssd_array->gender</td></tr>
    <tr><th>Height</th><td>$pssd_array->height</td></tr>
    <tr><th>weight</th><td>$pssd_array->weight</td></tr>
    <tr><th>smoking</th><td>$pssd_array->smoking</td></tr>
    <tr><th>beingTreated</th><td>$pssd_array->beingTreated</td></tr>
    <tr><th>Receiving</th><td>$pssd_array->receiving</td></tr>
   

    </table>
    </div>";

    echo $content;

?>
       
       
<?php 
    

     // $new = htmlspecialchars($content); 

  ?>








<?php 
//print_r();
?>


<script>
$('#a_on_list').click(function () {
        alert('download pdf..');
    });

$(document).ready(function () {
    


  var specialElementHandlers = {
    '#editor': function(element, renderer){
        return true;
    }
};



$("#button1").click(function (){
    

var confirmed = confirm('Do you wish to download <?php echo $pssd_array->surname; ?>.pdf file?');
if (confirmed){
    
      var doc = new jsPDF();

var div = <?=json_encode($content);?>;
////
    doc.fromHTML(div, 15, 15, {
    'width': 170, 
    'elementHandlers': specialElementHandlers
    });

 
////
    
/*doc.text(20, 20, 'Hello world!');
doc.text(20, 30, <?=json_encode($content);?>);
doc.addPage();*/
//doc.text(20, 20, 'Do you like that?');

doc.save('<?php echo $pssd_array->surname; ?>.pdf')

} else {
    //alert('download cancelled');
}

});


    $('[data-toggle="tooltip"]').tooltip(); 

});




</script>


</body>
</html>