<?php  
include_once("../sessions/session_usher.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$usher=$_SESSION['usher'];
$out_offrande=$con->query("select * from offrande
inner join evenement on offrande.evenement=evenement.eid where usher='$usher' and confirmation='non' and branche='$bid' order by offrande.oid desc;
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
												        <th>Trésorier</th>
												        <th>Administrateur</th>
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
												        $sign=$fetch_offrande['tresorier'];
												        $query=$con->query("select nom, prenom from utilisateur where uid='$sign' and branche='$bid';") or die (print_r($con->errorInfo()));
												        $fetch_sign=$query->fetch();

												        $signa=$fetch_offrande['administrateur'];
												        $querya=$con->query("select nom, prenom from utilisateur where uid='$signa' and branche='$bid';") or die (print_r($con->errorInfo()));
												        $fetch_signa=$querya->fetch();

												        ?>
												        <td><?php echo $fetch_sign['nom']." ".$fetch_sign['prenom']; ?></td>
												        <td><?php echo $fetch_signa['nom']." ".$fetch_signa['prenom']; ?></td>
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

												    
