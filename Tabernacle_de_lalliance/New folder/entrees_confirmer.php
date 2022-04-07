					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					
					<?php
		   			require_once("../setup/connection.php");

		   			$out_offrande=$con->query("select * from offrande
		   			inner join evenement on offrande.evenement=evenement.eid order by offrande.oid desc;
		   				") or die (print_r($con->errorInfo()));
		   			$count_offrande=$out_offrande->rowCount();

		   			?>
		   
			   			
			  
	</head>

					

	<body>


		   											
		   											<div class="panel-body">
											  
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tab">
											  	
												    <thead>
												      <tr>
												        <th>Culte</th>
												        <th>Recette (en GHS)</th>
												        <th>Date</th>
												        <th> </th>
												        <th> </th>
												        <th>Signataire</th>
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
												      <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_cid(<?php echo $fetch_offrande['oid']; ?>)" title="Confirmer l'entrée" style="color:red; " ><button type="button" id="confirmer" name="confirmer" class="btn btn-success">Confirmer</button></a></td>
									       			<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_rid(<?php echo $fetch_offrande['oid']; ?>)" title="Rejeter l'entrée" style="color:red; " ><button type="button" id="Rejeter" name="rejeter" class="btn btn-danger">Rejeter</button></a></td>
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

												    
	