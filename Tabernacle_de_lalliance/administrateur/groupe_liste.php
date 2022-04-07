<?php  
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];

$out_groupe=$con->query("select * from groupe
inner join membre on groupe.leader=membre.mid where groupe.branche='$bid' order by groupe.gid desc;") or die (print_r($con->errorInfo()));
$count_groupe=$out_groupe->rowCount();
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
												        <th>Groupe</th>
												        <th>Leader</th>
												        <th class="text-center">Modifier</th>
												        <th class="text-center">Supprimer</th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_groupe; $i++){
															$fetch_groupe=$out_groupe->fetch();
													    		?>
												      <tr>
												        <td><a href="gerer_liste.php?groupe=<?php echo $fetch_groupe['gid'];?>"><?php echo $fetch_groupe['groupe'];?></a></td>
												        <td> <?php echo $fetch_groupe['nom']." ".$fetch_groupe['prenom']." - ".$fetch_groupe['mid'] ;?></td>
												        <td class="text-center" style="vertical-align:middle"><a href="modifier_groupe.php? gid=<?php echo $fetch_groupe['gid'];?>" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									        			<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_id(<?php echo $fetch_groupe['gid']; ?>)" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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