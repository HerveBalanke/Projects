 <?php 
session_start ();

if (!isset($_SESSION['account']) || (trim($_SESSION['account']=='')))
{
header('location:../index.php');
exit();

}
?>

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

                $search= $_POST["search"];

                $query=$cons->query("select * from appointment where status='$search';");
                $count=$query->rowCount();
                if ($count<=0){
                  print "No record found! <br/> <br/>
                  <div class='col-md-4'> <h6 class='text-center'> <a href='appointments.php'> Return</a> </h6> </div>
                  ";
                }elseif($count>0){ ?>

                  
                     <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">Result for <?php  print $search;?> appointments</h3> <br/>

          </div>
          </div>
          <div class="row">
          
          <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead>
                  <tr>
                  <th>Dates</th>
                  <th>Patient's ID</th>
                  <th>Patient's name </th>
                  <th>Code of Vaccine</th>
                  <th>Dose of Vaccine</th>
                  <th>Dose(s) left</th>
                  <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                
                
            <?php 
            
                for($i=0; $i<$count; $i++){ 
                $list=$query->fetch();
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
                <div class="row">
          <div class="col-md-12">
            <a href='appointments.php' >View all </a> 

          </div>
          </div>

            <?php
                }
                $cons=Null;
                ?>

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


