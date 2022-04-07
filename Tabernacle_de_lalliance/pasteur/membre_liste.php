<?php
include_once("../sessions/session_pasteur.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$zone_cel=$_GET['zone'];
$out_membre_cel=$con->query("select * from membre_cel inner join cellule on cellule.cid=membre_cel.cellule 
 where zone_cel='$zone_cel' order by mcid desc;") or die (print_r($con->errorInfo()));
$count_membre_cel=$out_membre_cel->rowCount();

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
												        <th class="text-center">Nom</th>
												        <th class="text-center">Prenom</th>
												        <th class="text-center">Telephone</th>
												        <th class="text-center">Email</th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_membre_cel; $i++){
															$fetch_membre_cel=$out_membre_cel->fetch();
													    		?>
												      <tr>
												        <td class="text-center"><a href="cel_mem_at.php?mid=<?php echo $fetch_membre_cel['mcid'];?>&zone=<?php echo $zone_cel ; ?>"><?php echo $fetch_membre_cel['nom'];?> </a></td>
												        <td class="text-center"><a href="cel_mem_at.php?mid=<?php echo $fetch_membre_cel['mcid'];?>&zone=<?php echo $zone_cel ; ?>"><?php echo $fetch_membre_cel['prenom'];?> </a></td>
												        <td class="text-center"><?php echo $fetch_membre_cel['tel'];?></td>
												        <td class="text-center"><?php echo $fetch_membre_cel['email'];?></td>
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

												    
