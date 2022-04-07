	<?php

$reunion_det=$con->query("select * from reunion inner join cellule on reunion.cellule=cellule.cid where zone_cel='$zone_cel' and rid='$rid';") or die (print_r($con->errorInfo()));
$fetch_reunion_det=$reunion_det->fetch();
$out_membre_cel=$con->query("select * from presence inner join membre_cel on membre_cel.mcid=presence.membre 
inner join cellule on membre_cel.cellule=cellule.cid 
where zone_cel='$zone_cel' and presence.reunion='$rid' and statut='a';") or die (print_r($con->errorInfo()));
$count_membre_cel=$out_membre_cel->rowCount();

?>
<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
		   	  
	</head>

					

	<body>
				
						<div class="panel-body">
			  		<div class="table-responsive">
				    <table class="table table-striped table-condensed table-hover" id="tab_3">
			  	
				    <thead>
				      <tr>
				        <th class="text-center">Nom</th>
				        <th class="text-center">Prenom</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
					    	for($i=0; $i<$count_membre_cel; $i++){
							$fetch_membre_cel=$out_membre_cel->fetch();

					    		?>
				      <tr>
				        <td class="text-center"><?php echo $fetch_membre_cel['nom'];?></td>
				        <td class="text-center"><?php echo $fetch_membre_cel['prenom'];?></td>
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
    $('#tab_3').dataTable();
	});
	</script>

</html>
