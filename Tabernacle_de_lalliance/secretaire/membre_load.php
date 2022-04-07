<?php  
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$out_membre=$con->query("select * from membre inner join activite_ac on membre.activite_ac=activite_ac.acaid 
inner join t_membre on membre.t_membre=t_membre.tmid where branche='$bid' and statut='present';") or die (print_r($con->errorInfo()));
$count_membre=$out_membre->rowCount();

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
									        <th class="text-center">ID</th>
									        <th class="text-center">Nom</th>
									        <th class="text-center">Prenom</th>
									        <th class="text-center">Telephone</th>
									        <th class="text-center">Activitée</th>
									        <th class="text-center">Modifier</th>
									        <th class="text-center">Supprimer</th>
									        <th class="text-center">Statut</th>
									      </tr>
									    </thead>
									    <tbody>

									    	<?php
									    	for($i=0; $i<$count_membre; $i++){
									    		$fetch_mem=$out_membre->fetch();
									    		?>

									      <tr>
									        <td class="text-center" style="vertical-align:middle"><a href="view_membre.php? mid=<?php echo $fetch_mem ['mid'];?>"><?php echo $fetch_mem ["mid"];?> </a></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["nom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["prenom"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["tel"];?></td>
									        <td class="text-center" style="vertical-align:middle"><?php echo $fetch_mem ["activite_ac"];?></td>
									        <td class="text-center" style="vertical-align:middle"><a href="modifier_membre.php? mid=<?php echo $fetch_mem ['mid'];?>" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									        <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_pre_id(<?php echo $fetch_mem['id']; ?>)" > <span style="color:red;" class="glyphicon glyphicon-trash"></span></a></td>
									        <td class="text-center" style="vertical-align:middle"><a href="javascript:statut_id(<?php echo $fetch_mem['id']; ?>)" > <button type="button" class="btn btn-success">Partie?</button></a></td>
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