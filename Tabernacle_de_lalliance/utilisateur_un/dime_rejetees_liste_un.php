<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];
$out_dime=$con->query("select * from dime
inner join membre on dime.membre=membre.mid where tresorier='$treso' and confirmation='non' and branche='$bid';
") or die (print_r($con->errorInfo()));
$count_dime=$out_dime->rowCount();
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
												        <th>Date</th>
												        <th>Membre</th>
												        <th>Montant (en GHS)</th>
												        <th> </th>
												        <th> </th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_dime; $i++){
															$fetch_dime=$out_dime->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_dime['date'];?></td>
												        <td><?php echo $fetch_dime['mid'];?></td>
												        <td><?php echo $fetch_dime['montant'];?></td>
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

												    
