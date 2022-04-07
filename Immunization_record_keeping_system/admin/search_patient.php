 <?php

try{
              $cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
            }catch(PDOexception $e){
              die('ERROR:'.$e->getMessage());
            }

                $search= $_POST["search"];

                $query=$cons->query("select * from patient where pid like '$search%';");
                $count=$query->rowCount();
                if ($count<=0){
                  print '  <div class="row">
          <div class="col-md-4">
        </div>
          <div class="col-md-4">
          <div> No record found for '; print $search; echo' !</div><br/>
        </div>
         <div class="col-md-4">
        </div>
        </div> <div class="col-md-4"> <h6 class="text-center"> <a href="view_patient.php"> Return</a> <br/><br/></h6> </div>
                  '; 
                  
                }elseif($count>0){ ?>

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
  </div>

<br/><br/>-->

                     <div class="row">
          <div class="col-md-12">
            <h3 class="text-center">Result for <?php  print $search;?> </h3> <br/>

          </div>
          </div>
          <div class="row" >
          <div class="col-md-12">
            <table class="table table-hover table-striped">
                <thead>
                  <tr>
                  <th>Patient's ID</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Date Of Birth</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>History of Immunization </th>
                  <th>Edit</th>
                  <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                
                
            <?php 
            
                for($i=0; $i<$count; $i++){ 
                $list=$query->fetch();
            ?>
          
                  <tr>
                  <td><a href="patient_details.php?pid=<?php print $list["pid"]; ?>"><?php print $list["pid"]; ?> </a> </td>
                  <td><?php print $list["fname"]; ?> </td>
                  <td><?php print $list["lname"]; ?> </td>
                  <td><?php print $list["dob"]; ?> </td>
                  <td><?php print $list["tel"]; ?> </td>
                  <td><?php print $list["email"]; ?> </td>
                  <td><?php print $list["address"]; ?> </td>
                  <td><a href="history.php?pid=<?php print $list["pid"]; ?>">History</a></td>
                  <td ><a href="edit_patient.php?pid=<?php print $list["pid"]; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                  <td><a href="javascript:delete_id(<?php echo $list["pid"]; ?>)"><span class="glyphicon glyphicon-trash"></span></a></td>
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
            <a href='view_patient.php' >View all </a> 

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
url: "search_nurse.php",
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