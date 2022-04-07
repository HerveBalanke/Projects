<?php  
include_once("session_admin.php");
?>
					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$id=$_SESSION['id_un'];
		   			$out_offrande=$con->query("select * from offrande
		   			inner join evenement on offrande.evenement=evenement.eid where signataire_un='$id' and signataire_deux is NULL and signataire_trois='-' order by offrande.oid desc;
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
												        <th>Signataire</th>
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
												        $sign=$fetch_offrande['signataire_un'];
												        $query=$con->query("select nom, prenom from utilisateur_un where uid_un='$sign';") or die (print_r($con->errorInfo()));
												        $fetch_sign=$query->fetch();

												        ?>
												        <td><?php echo $fetch_sign['nom']." ".$fetch_sign['prenom']; ?></td>
												       <?php  $oid=$fetch_offrande['oid']?>
												       <td class="text-center" style="vertical-align:middle"><a href="modifier_offrande.php? oid=<?php echo $fetch_offrande ['oid'];?>&id=<?php echo $id;?>" title="Modifier" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_id('<?php echo $fetch_offrande['oid']; ?>','<?php echo $id;?>')" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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

												    
