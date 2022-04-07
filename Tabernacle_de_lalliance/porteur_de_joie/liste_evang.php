<?php		
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];
$zone=$_GET["zone"];
$out_evangelisation=$con->query("select * from evangelisation inner join zone on zone.zid=evangelisation.zone  where zone.zid='$zone' and status='OFF' order by date desc;") or die (print_r($con->errorInfo()));
$count_evangelisation=$out_evangelisation->rowCount();
?>
<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
	
			  
	</head>

					

	<body>


		   											
		   											<div class="panel-body">
											  	<div class="table-responsive">

												    <table class="table table-striped table-condensed table-hover" id="tab_1">
											  	
												    <thead>
												      <tr>
												      	<th class="text-center">Date d'Evangelisation</th>
												        <th class="text-center">Nom</th>
												        <th class="text-center">Prenom</th>
												        <th class="text-center">Telephone</th>
												        <th class="text-center">Modifier</th>
												        <th class="text-center">Supprimer</th>
												        <th class="text-center">Venu(e) ?</th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_evangelisation; $i++){
															$fetch_evangelisation=$out_evangelisation->fetch();
													    		?>

												      <tr>
												      	<td class="text-center"><?php echo $fetch_evangelisation['date'];?></td>
												        <td class="text-center"><?php echo $fetch_evangelisation['nom'];?></td>
												        <td class="text-center"><?php echo $fetch_evangelisation['prenom'];?></td>
												        <td class="text-center"><?php echo $fetch_evangelisation['tel'];?></td>
												      	<td class="text-center" style="vertical-align:middle"><a href="modifier_evangelisation_1.php?eid=<?php echo $fetch_evangelisation['eid']; ?>" title="modifier l'évangelisé" style="color:orange; " ><span class="glyphicon glyphicon-edit"></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_eid(<?php echo $fetch_evangelisation['eid']; ?>)" title="Supprimer l'évangelisé(e)" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:venu_eid(<?php echo $fetch_evangelisation['eid']; ?>)" title="a honoré l'invitation" style="color:red; " ><button type="button" class="btn btn-success">Oui</button></a></td>
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

												    
