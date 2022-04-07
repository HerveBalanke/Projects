					
<?php  
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
$out_sms=$con->query("select distinct * from sms_cellule_envoi
inner join sms_cellule on sms_cellule.sms_cel_id=sms_cellule_envoi.sms_cel_ide where branche='$zone_cel' order by sms_cel_ide;") or die (print_r($con->errorInfo()));
$count_sms=$out_sms->rowCount();
?>

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
			
			  
	</head>

					

	<body>
									<div class="panel-body">
         											<div class="table-responsive">
         											<table class="table table-striped table-condensed table-hover" id="tab">
													    <thead>
													      <tr>
													        <th>SMS</th>
													        <th>Date</th>
													      </tr>
													    </thead>
													    <tbody>
													    	<?php
													    	for($i=0; $i<$count_sms; $i++){
															$fetch_sms=$out_sms->fetch();
													    		?>
													      <tr>
													        <td> <a href="view_sms_num.php?sms_id=<?php echo $fetch_sms['smscid'];?>"> <?php echo $fetch_sms['sms'];?></a></td>
													        <td> <?php echo $fetch_sms['date'];?> </td>
													      </tr>
													      <?php 
													  	} 
													 ?>
													    </tbody>
													  </table>
													  </div>

											  			</div>


</body>


 
	<script src="../data_table/media/js/jquery.dataTables.min.js"></script>


	 <script type="text/javascript">
	 $(document).ready(function(){
    $('#tab').dataTable();
	});
	</script>

</html>