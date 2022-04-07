					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_depense=$con->query("select * from depense order by did desc limit 15;") or die (print_r($con->errorInfo()));
		   			$count_depense=$out_depense->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									<div class="panel-body">
											  	<div class="table-responsive">
												<table class="table table-striped table-condensed table-hover" id="tab2">
											  	
												    <thead>
												      <tr>
												        <th>Date</th>
												        <th>Motif</th>
												        <th>Montant (en GHS)</th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_depense; $i++){
															$fetch_depense=$out_depense->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_depense['date'];?></td>
												        <td><?php //echo $fetch_depense['motif'];?></td>
												        <td><?php echo $fetch_depense['montant'];?></td>
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