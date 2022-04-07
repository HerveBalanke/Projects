					
<?php  
include_once("session_deux.php");
?>
<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_sms=$con->query("select distinct * from sms_envoi
		   				inner join sms on sms_envoi.smsid=sms.sid order by smsid;") or die (print_r($con->errorInfo()));
		   			$count_sms=$out_sms->rowCount();
		   			?>
		   
			   			
			  
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