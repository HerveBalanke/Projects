					
<?php  
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];
$out_sms=$con->query("select distinct * from sms_porteur_envoi
inner join sms_porteur on sms_porteur_envoi.sms_pide=sms_porteur.sms_pide order by sms_porteur_envoi.sms_pide;") or die (print_r($con->errorInfo()));
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
													        <td> <a href="view_sms_num.php?sms_id=<?php echo $fetch_sms['smsid'];?>"> <?php echo $fetch_sms['sms'];?></a></td>
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