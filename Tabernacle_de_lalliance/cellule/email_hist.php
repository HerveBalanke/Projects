<?php  
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
$out_email=$con->query("select distinct * from email_cel_envoi
inner join email on email_cel_envoi.emailcid=email.emid where branche='$zone_cel' order by date desc;") or die (print_r($con->errorInfo()));
$count_email=$out_email->rowCount();
?>

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
	
			  
	</head>

					

	<body>
									<div class="panel-body">
         											<div class="table-responsive">
         											<table class="table table-striped table-condensed table-hover" id="tab2">
													    <thead>
													      <tr>
													        <th>Email</th>
													        <th>Date</th>
													      </tr>
													    </thead>
													    <tbody>
													    	<?php
													    	for($i=0; $i<$count_email; $i++){
															$fetch_email=$out_email->fetch();
													    		?>
													      <tr>
													        <td> <a href="view_email_num.php?email_id=<?php echo $fetch_email['emailid'];?>"> <?php echo $fetch_email['text'];?></a></td>
													        <td> <?php echo $fetch_email['date'];?> </td>
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
    $('#tab2').dataTable();
	});
	</script>

</html>