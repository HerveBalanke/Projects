				

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");

		   			$out_cellule=$con->query("select * from cellule order by cid desc;") or die (print_r($con->errorInfo()));
		   			$count_cellule=$out_cellule->rowCount();

		   			?>
		   
			   			
			  
	</head>

					

	<body>
			

		   											
		   											<div class="panel-body">
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tab_1">
											  	
												    <thead>
												      <tr>
												        <th class="text-center">Nom</th>
												        <th class="text-center">Prenom</th>
												        <th class="text-center">Telephone</th>
												        <th class="text-center">Email</th>
												        <th class="text-center">Mot de Passe</th>
												        <th class="text-center"> </th>
												        <th class="text-center"> </th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_cellule; $i++){
															$fetch_cellule=$out_cellule->fetch();
													    		?>
												      <tr>
												        <td class="text-center"><?php echo $fetch_cellule['lnom'];?></td>
												        <td class="text-center"><?php echo $fetch_cellule['lprenom'];?></td>
												        <td class="text-center"><?php echo $fetch_cellule['tel'];?></td>
												        <td class="text-center"><?php echo $fetch_cellule['email'];?></td>
												        <td class="text-center"><?php echo $fetch_cellule['pass'];?></td>
												      	<td class="text-center" style="vertical-align:middle"><a href="modifier_leader.php?cid=<?php echo $fetch_cellule['cid']; ?>" title="modifier le compte" style="color:orange; " ><span class="glyphicon glyphicon-edit"></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_cid(<?php echo $fetch_cellule['cid']; ?>)" title="Supprimer le compte" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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
    $('#tab_1').dataTable();
	});
	</script>

</html>

												    
