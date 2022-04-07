<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];
$out_dime=$con->query("select * from dime
inner join utilisateur on utilisateur.uid=dime.tresorier
inner join membre on dime.membre=membre.mid where tresorier='$treso' and (usher='non' OR admin='non') and dime.branche='$bid';
") or die (print_r($con->errorInfo()));
$count_dime=$out_dime->rowCount();
?>
					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
   						  
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
												        <th>Usher</th>
												        <th>Administrateur</th>
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
												        $ush=$fetch_dime['usher_id'];
												        $out_ush=$con->query("select * from utilisateur where uid='$ush';");
												        $out_ush_name=$out_ush->fetch();

												        $adm=$fetch_dime['admin_id'];
												        $out_adm=$con->query("select * from utilisateur where uid='$adm';");
												        $out_adm_name=$out_adm->fetch();
												        ?>
												        <td><?php echo $out_ush_name['nom'].' '.$out_ush_name['prenom'].' - '.strtoupper($fetch_dime['usher']);?></td>
												        <td><?php echo $out_adm_name['nom'].' '.$out_adm_name['prenom'].' - '.strtoupper($fetch_dime['admin']);?></td>
												      <td class="text-center" style="vertical-align:middle"><a href="modifier_dime_rej.php? did=<?php echo $fetch_dime ['diid'];?>" title="Modifier" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_did(<?php echo $fetch_dime['diid']; ?>)" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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

												    
