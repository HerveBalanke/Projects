<?php  
include_once("../sessions/session_pasteur.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$pasteur=$_SESSION['pasteur'];
$out_lead=$con->query("select * from cellule order by cid desc;") or die (print_r($con->errorInfo()));
$count_lead=$out_lead->rowCount();
?>				

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css"> 			
			  
	</head>

					

	<body>
			

		   											
		   											<div class="panel-body">
		   											<p>
		   												<b>NB:</b> Le nom d'leadlisateur de pour les comptes des leadeurs est <b>LeaderCellule</b>.
											  		</p><br/>
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tab_1">
											  	
												    <thead>
												      <tr>
												        <th class="text-center">Nom</th>
												        <th class="text-center">Prenom</th>
												        <th class="text-center">Telephone</th>
												        <th class="text-center">Email</th>
												         <th class="text-center">Statut</th>
												        <th class="text-center"> </th>
												        <th class="text-center"> </th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_lead; $i++){
															$fetch_lead=$out_lead->fetch();
													    		?>
												      <tr>
												        <td class="text-center"><?php echo $fetch_lead['lnom'];?></td>
												        <td class="text-center"><?php echo $fetch_lead['lprenom'];?></td>
												        <td class="text-center"><?php echo $fetch_lead['tel'];?></td>
												        <td class="text-center"><?php echo $fetch_lead['email'];?></td>
												        <td class="text-center" style="vertical-align:middle">
									        	<?php
									        	if( $fetch_lead ["desactivate"]=="off"){ ?>
									        		<a href="javascript:inactive_cid('<?php echo $fetch_lead['cid']; ?>', '<?php echo $bid; ?>')" > <button type="button" class="btn btn-success">Actif</button> </a>
									        		<?php
									        	} else if( $fetch_lead ["desactivate"]=="on"){ ?>
									        		<a href="javascript:active_cid('<?php echo $fetch_lead['cid']; ?>', '<?php echo $bid; ?>')" > <button type="button" class="btn btn-danger">Inactif</button> </a>

									        	<?php } ?></td>
												      	<td class="text-center" style="vertical-align:middle"><a href="modifier_leader.php?cid=<?php echo $fetch_lead['cid']; ?>" title="modifier le compte" style="color:orange; " ><span class="glyphicon glyphicon-edit"></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_cid(<?php echo $fetch_lead['cid']; ?>)" title="Supprimer le compte" style="color:red; " ><span class="glyphicon glyphicon-trash"></span></a></td>
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

												    
