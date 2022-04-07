					
<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];

$out_depense=$con->query("select * from depense where tresorier='$treso' and administrateur='-' and branche='$bid' order by did desc ;") or die (print_r($con->errorInfo()));
$count_depense=$out_depense->rowCount();
?>
<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
  
	</head>

					

	<body>
									<div class="panel-body">
											  	<div class="table-responsive">
												<table class="table table-striped table-condensed table-hover" id="tab2">
											  	
												    <thead>
												      <tr>
												        <th>Date</th>
												        <th>Motif</th>
												        <th>Montant (en GHS)</th>
												        <th></th>
												        <th></th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_depense; $i++){
															$fetch_depense=$out_depense->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_depense['date'];?></td>
												        <td><a href="sortie_desc.php?soid=<?php echo $fetch_depense['did'];?>" title="Voir"><?php echo $fetch_depense['motif'];?></a></td>
												        <td><?php echo $fetch_depense['montant'];?></td>
												         <td class="text-center" style="vertical-align:middle"><a href="modifier_sortie.php? soid=<?php echo $fetch_depense ['did'];?>" title="Modifier" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_soid(<?php echo $fetch_depense['did']; ?>)" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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
    $('#tab2').dataTable();
	});
	</script>

</html>