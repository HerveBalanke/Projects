<?php  
include_once("../sessions/session_usher.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$usher=$_SESSION['usher'];
$out_dime=$con->query("select * from dime
inner join membre on dime.membre=membre.mid where usher='$usher' and confirmation='non' and branche='$bid';
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
												        <th>Trésorier</th>
												        <th>Administrateur</th>
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
												        $sign=$fetch_dime['tresorier'];
												        $query=$con->query("select nom, prenom from utilisateur where uid='$sign' and branche='$bid';") or die (print_r($con->errorInfo()));
												        $fetch_sign=$query->fetch();

												        $signa=$fetch_dime['administrateur'];
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

												    
