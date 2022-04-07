				

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../connection.php");

		   			$out_utilisateur=$con->query("select * from cellule order by uid desc;") or die (print_r($con->errorInfo()));
		   			$count_utilisateur=$out_utilisateur->rowCount();

		   			?>
		   
			   			
			  
	</head>

					

	<body>
			

		   											
		   											<div class="panel-body">
		   											<p>
		   												<b>NB:</b> Le nom d'utilisateur de pour les comptes est <b>ZanzyAuto</b>.
											  		</p><br/>
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
													    	for($i=0; $i<$count_utilisateur; $i++){
															$fetch_utilisateur=$out_utilisateur->fetch();
													    		?>
												      <tr>
												        <td class="text-center"><?php echo $fetch_utilisateur['lnom'];?></td>
												        <td class="text-center"><?php echo $fetch_utilisateur['lprenom'];?></td>
												        <td class="text-center"><?php echo $fetch_utilisateur['tel'];?></td>
												        <td class="text-center"><?php echo $fetch_utilisateur['email'];?></td>
												        <td class="text-center"><?php echo $fetch_utilisateur['pass'];?></td>
												      	<td class="text-center" style="vertical-align:middle"><a href="modifier_utilisateur.php?uid=<?php echo $fetch_utilisateur['uid']; ?>" title="modifier le compte" style="color:orange; " ><span class="glyphicon glyphicon-edit"></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_cid(<?php echo $fetch_utilisateur['uid']; ?>)" title="Supprimer le compte" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
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

												    
