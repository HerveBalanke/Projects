<?php  
include_once("session_admin.php");
?>					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					
					<?php
		   			require_once("../setup/connection.php");
		   			$id=$_SESSION['id_admin'];
		   			$out_offrande=$con->query("select * from offrande
		   			inner join evenement on offrande.evenement=evenement.eid where signataire_un!='' and signataire_un is NOT NULL and signataire_deux!='-' and signataire_deux is NOT NULL and signataire_trois='-' order by offrande.oid desc;
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
												        <th>Signataire Un</th>
												        <th>Signataire Deux</th>
												        <th> </th>
												        <th> </th>
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
												        <?php 
												        $sign_un=$fetch_offrande['signataire_un'];
												        $sign=$fetch_offrande['signataire_deux'];
												        $query_un=$con->query("select nom, prenom from utilisateur_un where uid_un='$sign_un';") or die (print_r($con->errorInfo()));
												        $fetch_sign_un=$query_un->fetch();
												        $query=$con->query("select nom, prenom from utilisateur_deux where uid_deux='$sign';") or die (print_r($con->errorInfo()));
												        $fetch_sign=$query->fetch();

												        ?>
												        <td><?php echo $fetch_sign_un['nom']." ".$fetch_sign_un['prenom']; ?></td>
												        <td><?php echo $fetch_sign['nom']." ".$fetch_sign['prenom']; ?></td>
												       <?php  $oid=$fetch_offrande['oid']?>
												      <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_cid('<?php echo $fetch_offrande['oid']; ?>','<?php echo $id; ?>')" title="Confirmer l'entrée" style="color:red; " ><button type="button" id="confirmer" name="confirmer" class="btn btn-success">Confirmer</button></a></td>
									       			<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_rid('<?php echo $fetch_offrande['oid']; ?>','<?php echo $id; ?>')" title="Rejeter l'entrée" style="color:red; " ><button type="button" id="Rejeter" name="rejeter" class="btn btn-danger">Rejeter</button></a></td>
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

												    
	