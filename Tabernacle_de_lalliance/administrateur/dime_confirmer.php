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
		   			$out_dime=$con->query("select * from dime
		   			inner join membre on dime.membre=membre.mid where signataire_un is NOT NULL and signataire_deux!='-' and signataire_deux is NOT NULL and signataire_trois='-';
		   				") or die (print_r($con->errorInfo()));
		   			$count_dime=$out_dime->rowCount();

		   			?>
		   
			   			
			  
	</head>

					

	<body>
			

		   											
		   											<div class="panel-body">
											  
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tab">
											  	
												    <thead>
												      <tr>
												        <th>Membre</th>
												        <th>Montant (en GHS)</th>
												        <th>Date</th>
												        <th>Signataire Un</th>
												        <th>Signataire Deux</th>
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
												        <td><?php echo $fetch_dime['mid'];?></td>
												        <td><?php echo $fetch_dime['montant'];?></td>
												        <td><?php echo $fetch_dime['date'];?></td>
												         <?php 
												        $sign_un=$fetch_dime['signataire_un'];
												        $sign_deux=$fetch_dime['signataire_deux'];
												        $query_un=$con->query("select nom, prenom from utilisateur_un where uid_un='$sign_un';") or die (print_r($con->errorInfo()));
												        $fetch_sign_un=$query_un->fetch();
												        $query_deux=$con->query("select nom, prenom from utilisateur_deux where uid_deux='$sign_deux';") or die (print_r($con->errorInfo()));
												        $fetch_sign_deux=$query_deux->fetch();

												        ?>
												        <td><?php echo $fetch_sign_un['nom']." ".$fetch_sign_un['prenom']; ?></td>
												        <td><?php echo $fetch_sign_deux['nom']." ".$fetch_sign_deux['prenom']; ?></td>
												       <?php  $diid=$fetch_dime['diid']; ?>
												      <td class="text-center" style="vertical-align:middle"><a href="javascript:con('<?php echo $diid ; ?>', '<?php echo $id ; ?>')" title="Valider l'entrée" style="color:red; " ><button type="button" id="valider" name="valider" class="btn btn-success">Confirmer</button></a></td>
									       			<td class="text-center" style="vertical-align:middle"><a href="javascript:rej('<?php echo $diid ; ?>', '<?php echo $id ; ?>')" title="Rejeter l'entrée" style="color:red; " ><button type="button" id="Rejeter" name="rejeter" class="btn btn-danger">Rejeter</button></a></td>
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

												    
