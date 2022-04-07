
<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];

$out_culte=$con->query("select * from evenement order by evenement asc;") or die(print_r($con->errorInfo()));
$count_culte=$out_culte->rowCount();

$out_offrande=$con->query("select * from offrande
inner join utilisateur on utilisateur.uid=offrande.tresorier
inner join evenement on offrande.evenement=evenement.eid where tresorier='$treso' and (usher='non' OR admin='non') and offrande.branche='$bid' order by offrande.oid desc;
	") or die (print_r($con->errorInfo()));
$count_offrande=$out_offrande->rowCount();
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
												        <th>Culte</th>
												        <th>Recette (en GHS)</th>
												        <th>Date</th>
												        <th>Usher</th>
												        <th>Administrateur</th>
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
												        $ush=$fetch_offrande['usher_id'];
												        $out_ush=$con->query("select * from utilisateur where uid='$ush';");
												        $out_ush_name=$out_ush->fetch();

												        $adm=$fetch_offrande['admin_id'];
												        $out_adm=$con->query("select * from utilisateur where uid='$adm';");
												        $out_adm_name=$out_adm->fetch();
												        ?>
												        <td><?php echo $out_ush_name['nom'].' '.$out_ush_name['prenom'].' - '.strtoupper($fetch_offrande['usher']);?></td>
												        <td><?php echo $out_adm_name['nom'].' '.$out_adm_name['prenom'].' - '.strtoupper($fetch_offrande['admin']);?></td>

												       <td class="text-center" style="vertical-align:middle"><a href="modifier_offrande_rej.php? oid=<?php echo $fetch_offrande ['oid'];?>" title="Modifier" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									       			   <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_id(<?php echo $fetch_offrande['oid']; ?>)" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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

												    
