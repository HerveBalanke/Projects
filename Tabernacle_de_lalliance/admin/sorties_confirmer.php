<?php  
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];

$out_sorties=$con->query("select * from depense where tresorier!='-' and administrateur='-' and branche ='$bid';
") or die (print_r($con->errorInfo()));
$count_sorties=$out_sorties->rowCount();
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
												        <th>Date</th>
												        <th>Motif</th>
												        <th>Montant (en GHS)</th>
												        <th>Trésorier</th>
												        <th> </th>
												        <th> </th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_sorties; $i++){
															$fetch_sorties=$out_sorties->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_sorties['date'];?></td>
												        <td><a href="sortie_desc.php?soid=<?php echo $fetch_sorties['did'];?>" title="Voir"><?php echo $fetch_sorties['motif'];?></a></td>
												        <td><?php echo $fetch_sorties['montant'];?></td>
												         <?php 
												        $tresorier=$fetch_sorties['tresorier'];
												        $query_un=$con->query("select nom, prenom from utilisateur where uid='$tresorier';") or die (print_r($con->errorInfo()));
												        $fetch_sign_un=$query_un->fetch();

												        ?>
												        <td><?php echo $fetch_sign_un['nom']." ".$fetch_sign_un['prenom']; ?></td>
												       <?php  $did=$fetch_sorties['did']; ?>
												      <td class="text-center" style="vertical-align:middle"><a href="javascript:con(<?php echo $did ; ?>)" title="Confirmer la sortie" style="color:red; " ><button type="button" id="confirmer" name="valider" class="btn btn-success">Confirmer</button></a></td>
									       			<td class="text-center" style="vertical-align:middle"><a href="javascript:rej(<?php echo $did ; ?>)" title="Rejeter la sortie" style="color:red; " ><button type="button" id="Rejeter" name="rejeter" class="btn btn-danger">Rejeter</button></a></td>
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

												    
