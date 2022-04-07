<?php  
include_once("session_deux.php");
?>
					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$id=$_SESSION['id_deux'];

		   			$out_sorties=$con->query("select * from depense where signataire_un is NOT NULL and signataire_deux='$id' and signataire_trois is NULL;
		   				") or die (print_r($con->errorInfo()));
		   			$count_sorties=$out_sorties->rowCount();

		   			?>
		   
			   			
			  
	</head>

					

	<body>
			

		   											
		   											<div class="panel-body">
											  
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tab">
											  	
												    <thead>
												      <tr>
												        <th>Date</th>
												        <th>Motif</th>
												        <th>Montant (en GHS)</th>
												        <th> </th>
												        <th> </th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_sorties; $i++){
															$fetch_sorties=$out_sorties->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_sorties['date'];?></td>
												        <td><a href="sortie_desc_rej.php?soid=<?php echo $fetch_sorties['did'];?>&id=<?php echo $id; ?>" title="Voir"><?php echo $fetch_sorties['motif'];?></a></td>
												        <td><?php echo $fetch_sorties['montant'];?></td>
												       <?php  $did=$fetch_sorties['did']; ?>
												      <td class="text-center" style="vertical-align:middle"><a href="modifier_sortie_rej.php? soid=<?php echo $fetch_sorties ['did'];?>&id=<?php echo $id; ?>" title="Modifier" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_soid('<?php echo $fetch_sorties['did']; ?>','<?php echo $id; ?>')" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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

												    
