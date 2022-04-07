
<?php 
session_start ();

if (!isset($_SESSION["admin"]) || (trim($_SESSION["admin"]=='')))
{
header('location:../index.php');
exit();

}
?> <?php

try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }


            /*$session=$_SESSION['account'];
             $fn=$cons->query("select * from nurse where uname='$session';");
            $session2= $fn->fetch();
            $session3=$session2["fname"];
            $nses=$session2["nid"];
            $today=date('Y-m-d');

                

                $query=$cons->query("select * from vaccination where dates='$today' and nurse='$nses' and patient like '$search%';");
             $row=$query->rowCount();*/

             $search= $_POST["search"];
             $snid=$_POST["nid"];
             $query=$cons->query("select * from vaccination where dates='$search' and nurse='$snid';");
             $row=$query->rowCount();

                if ($row<=0){
                  print '  <div class="row">
          <div class="col-md-4">

        </div>
          <div class="col-md-4">
          <div> No record found for '; print $search; echo' !</div><br/>
        </div>
         <div class="col-md-4">
        </div>
        </div> <div class="col-md-4"> <h6 class="text-center"> <a href="vac_account.php"> Return</a> <br/><br/></h6> </div>
                  '; 
                  
                }elseif($row>0){ ?>

               <!-- <div class="row" id='replace'>
          <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" id="search" placeholder="Search by firtsname">
                    <div id='check_search' style="color:red"></div>
                       
                    <span class="input-group-addon">
                        <button type="button" name="submit"  id="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>
  </div>-->
  <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">Result for <?php  print $search;?> </h3> <br/>

          </div>
          </div>

           <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
            <table class="table table-hover table-striped table-condensed">
               <thead>
                  <tr>
                  <th>Patient'ID</th>
                  <th>Patient's Name</th>
                  <th>Vaccine (Vaccine Code)</th>
                  <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                


   <?php 
            
                for($i=0; $i<$row; $i++){ 
                $fetch=$query->fetch();

        $pid=$fetch["patient"];
 $nurse=$fetch["nurse"];
$vcode=$fetch["vcode"];
//echo $vcode;


 $query2=$cons->query("select * from patient where pid='$pid';");
 $fetch2=$query2->fetch();
$fname=$fetch2['fname'];
$lname=$fetch2['lname'];

$query3=$cons->query("select * from nurse where nid='$nurse';");
 $fetch3=$query3->fetch();
$nfname=$fetch3['fname'];
$nlname=$fetch3['lname'];

$query4=$cons->query("select * from vaccine where vcode='$vcode';");
 $fetch4=$query4->fetch();
$vname=$fetch4['vname'];
$vprice=$fetch4['vprice'];


            ?>
          
                  <tr>
                  <td><?php print $pid; ?> </td>
                  <td><?php print $fname." "; echo $lname; ?> </td>
                  <td><?php echo $vname; ?> (<?php echo $vcode; ?>)</td>
                  <td><?php echo $fetch['dates'] ; ?></td>
                  </tr>
                 
            <?php   
                  }
            ?>
                



   </tbody>
                </table>

              </div>
          </div>
          <div class="col-md-2">
          </div>
        </div>
      
                <div class="row">
          <div class="col-md-12">
            <a href='vac_account.php' >View all </a> 

          </div>
          </div>

            <?php
                }
                $cons=Null;
                ?>


               <script type="text/javascript">  
  
   $(function() {
$("#submit").click(function() {
  var search= $("#search").val();

  if (search.length == 0 ) {
$('#check_search').html("*Please enter the <strong>Search Criteria</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#search").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}else{
 
var dataString= "search="+ search;
//alert(dataString);

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
url: "search_vac.php",
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
}
});
});
      </script> 
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


