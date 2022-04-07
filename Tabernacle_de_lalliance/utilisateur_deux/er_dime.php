<?php  
include_once("session_deux.php");
?>					

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

   					<?php
		   			require_once("../setup/connection.php");
		   			$id=$_SESSION['id_deux'];
		   			$out_dime=$con->query("select * from dime
		   			inner join membre on dime.membre=membre.mid where signataire_un='-' and signataire_deux='$id' and signataire_trois='-' order by dime.diid desc;
		   				") or die (print_r($con->errorInfo()));
		   			$count_dime=$out_dime->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									
		   											<div class="panel-body">
											  
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tabtwo">
											  	
												    <thead>
												      <tr>
												        <th>Membre</th>
												        <th>Montant (en GHS)</th>
												        <th>Date</th>
												        <th></th>
												        <th></th>
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
												        <td class="text-center" style="vertical-align:middle"><a href="modifier_dime.php? did=<?php echo $fetch_dime ['diid'];?>&id=<?php echo $id;?>" title="Modifier" style="color:orange;" ><span class="glyphicon glyphicon-edit"></span></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_did('<?php echo $fetch_dime['diid']; ?>','<?php echo $id;?>')" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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
    $('#tabtwo').dataTable();
	});
	</script>

</html>

