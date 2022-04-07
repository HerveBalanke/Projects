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

		   			$out_sorties=$con->query("select * from depense where signataire_un!='-' and signataire_un is NOT NULL and signataire_deux ='-' and signataire_trois ='-';
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
												        <th>Signataire Un</th>
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
												        <td><a href="sortie_desc.php?soid=<?php echo $fetch_sorties['did'];?>" title="Voir"><?php echo $fetch_sorties['motif'];?></a></td>
												        <td><?php echo $fetch_sorties['montant'];?></td>
												        <?php 
												        $sign=$fetch_sorties['signataire_un'];
												        $query=$con->query("select nom, prenom from utilisateur_un where uid_un='$sign';") or die (print_r($con->errorInfo()));
												        $fetch_sign=$query->fetch();

												        ?>
												        <td><?php echo $fetch_sign['nom']." ".$fetch_sign['prenom']; ?></td>
												       <?php  $did=$fetch_sorties['did']; ?>
												      <td class="text-center" style="vertical-align:middle"><a href="javascript:val('<?php echo $id; ?>', '<?php echo $did; ?>')" title="Valider la sortie" style="color:red; " ><button type="button" id="valider" name="valider" class="btn btn-success">Valider</button></a></td>
									       			<td class="text-center" style="vertical-align:middle"><a href="javascript:rej('<?php echo $id; ?>', '<?php echo $did; ?>')" title="Rejeter la sortie" style="color:red; " ><button type="button" id="Rejeter" name="rejeter" class="btn btn-danger">Rejeter</button></a></td>
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

												    
