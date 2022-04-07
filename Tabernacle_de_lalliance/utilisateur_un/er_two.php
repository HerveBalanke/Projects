					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$out_offrande=$con->query("select * from offrande
		   			inner join evenement on offrande.evenement=evenement.eid order by offrande.oid desc limit 15;
		   				") or die (print_r($con->errorInfo()));
		   			$count_offrande=$out_offrande->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									
		   											<div class="panel-body">
											  
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tabtwo">
											  	
												    <thead>
												      <tr>
												        <th>Culte</th>
												        <th>Recette (en GHS)</th>
												        <th>Date</th>
												        <th></th>
												        <th></th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_offrande; $i++){
															$fetch_offrande=$out_offrande->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_offrande['evenement'];?></td>
												        <td><?php echo $fetch_offrande['recette'];?></td>
												        <td><?php echo $fetch_offrande['date'];?></td>
												        <td class="text-center" style="vertical-align:middle"><a href="modifier_offrande.php? oid=<?php echo $fetch_offrande ['oid'];?>" title="Modifier" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_id(<?php echo $fetch_offrande['oid']; ?>)" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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
    $('#tabtwo').dataTable();
	});
	</script>

</html>

