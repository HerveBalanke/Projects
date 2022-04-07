<?php 
session_start ();

if (!isset($_SESSION['account']) || (trim($_SESSION['account']=='')))
{
header('location:../index.php');
exit();

}
?>
<!DOCTYPE html>
<html>

    <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name="description" content="">
              <meta name="author" content="">
              <link type='text/css' rel='stylesheet' href='../CSS/radius.css'/>
              <link type='text/css' rel='stylesheet' href='../CSS/pagination.css'/>
                <title> FIS</title>
                
           <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 





    <?php
            
          try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

            $session=$_SESSION['account'];

            $fn=$cons->query("select * from nurse where uname='$session';");
            $session2= $fn->fetch();
            $session3=$session2["fname"];

            $today=date('Y-m-d');
            
            $out=$cons->query("select * from appointment order by dates;") or die (print_r($out->errorInfo()));
            $row= $out-> rowCount();
            // where date=today and dose left>0 and status=unpassed

        ?>


                <script type="text/javascript">
function delete_id(vid)
{
     if(confirm('Delete vaccine ?'))
     {
        window.location.href='delete_vac.php?delete_id='+vid;
     }
}
</script>
    
    </head>

 <body>
    
 <body>
        <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img src="../CSS/images/0.jpg"
            class="center-block img-responsive ">
                     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="wel.php"><?php echo $session3; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Vaccines
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="view_vaccine.php">View Vaccine</a></li>
            <li><a href="vac_qty.php">Update Stock</a></li> 
            <li><a href="vac_chart.php">Vaccine Inventory</a></li> 
          </ul>
        </li>
        <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Patients
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="add_patient.php">Add Patient</a></li>
            <li><a href="view_patient.php">View Patients</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage Vaccinations
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="vaccination.php">Record Vaccination</a></li>
            <li><a href="vac_account.php">Daily Vaccination</a></li>
            <li><a href="view_appointment.php">Daily Appointments</a></li>
          </ul>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
  </div>
  </div>
  </div>

<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center">Appointments</h1> <br/><br/>
</div> 
</div>


  <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <select class="form-control" id="search" placeholder="Search">
                        <option> </option>
    <option>Passed</option>
    <option>Unpassed</option>
  </select>
                    <span class="input-group-addon">
                        <button type="submit" name="submit"  id="submit" onClick="submit ()">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>
  </div>

  <br/><br/>



        <div id='replace'>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead>
                  <tr>
                  <th>Dates</th>
                  <th>Patient's ID </th>
                  <th>Patient's name </th>
                  <th>Code of Vaccine</th>
                  <th>Dose of Vaccine</th>
                  <th>Dose(s) left</th>
                  <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                
                
            <?php 
            
                for($i=0; $i<$row; $i++){ 
                $list=$out->fetch();
            $vac= $list['vaccination'];
            $outs=$cons->query("select * from vaccination where vid='$vac';") or die (print_r($outs->errorInfo()));
            $fetch=$outs->fetch();
            $pid=$fetch["patient"];
            $dos=$fetch["dose"];
            //$row= $out-> rowCount();
            $pa=$cons->query("select * from patient where pid='$pid';") or die (print_r($pa->errorInfo()));
            $fetchpa=$pa->fetch();

            $do=$cons->query("select * from dose where did='$dos';") or die (print_r($pa->errorInfo()));
            $fetchdo=$do->fetch();

            ?>
          
                  <tr>
                  <td><?php print $list["dates"]; ?> </td>
                  <td><?php print $list["patient"]; ?> </td>
                  <td><?php print $fetchpa["fname"]. " ".$fetchpa["lname"]; ?></td>
                  <td><?php print $fetch["vcode"]; ?> </td>
                  <td><?php print $fetchdo["dose"]; ?> </td>
                  <td><?php print $list["dose_left"]; ?> </td>
                  <td><?php print $list["status"]; ?> </td>
        
                  </tr>
                 
            <?php   
                  }
            ?>
                
                </tbody>
                </table>


          </div>
        </div>
      </div>
      
    
    </div>
  </div>


  <footer class="section section-primary">
      <div class="container"> <h5 class="text-center">&copy; FIS 2016</h5> </div>
    </footer>
  </body>
       <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
    
$('table.table-hover').each(function() {
    var currentPage = 0;
    var numPerPage = 15;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
        $('<span class="page-number"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('active').siblings().removeClass('active');
        }).appendTo($pager).addClass('clickable');
    }
    $pager.insertAfter($table).find('span.page-number:first').addClass('active');
});
          
  </script> 

      <script type="text/javascript">  
  
   $(function() {
$("#submit").click(function() {
  var search= $("#search").val();
 

var dataString ="search="+ search;
alert(dataString);

/*if(textcontent=='')
{
alert("Enter some text..");
$("#content").focus();
}{*/
//$("#flash").show();

//else
//$("#flash").fadeIn(400).html("<div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:100%'> <strong>Adding</strong></div></div>");
$.ajax({
type: "POST",
url: "appointment_search.php",
data:dataString,
cache: true,
success: function(html){
//$("#flash").html(html);
$("#replace").html(html);
document.getElementById('search').value=' ';
}  
});
//}
return false;
});
});
      </script> 

    </html>