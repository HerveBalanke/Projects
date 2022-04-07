<?php  
include_once("../sessions/session_admin.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$admin=$_SESSION['admin'];
$out_offrande=$con->query("select * from offrande
inner join evenement on offrande.evenement=evenement.eid where tresorier!='-' and usher='oui' and admin='-' and branche ='$bid' order by offrande.oid desc;
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
												        <th>Usher</th>
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
												        $sign=$fetch_offrande['tresorier'];
												        $query=$con->query("select nom, prenom from utilisateur where uid='$sign' and branche='$bid';") or die (print_r($con->errorInfo()));
												        $fetch_sign=$query->fetch();
												        $signu=$fetch_offrande['usher_id'];
												        $queryu=$con->query("select nom, prenom from utilisateur where uid='$signu' and branche='$bid';") or die (print_r($con->errorInfo()));
												        $fetch_signu=$queryu->fetch();

												        ?>
												        <td><?php echo $fetch_sign['nom']." ".$fetch_sign['prenom']; ?></td>
												        <td><?php echo $fetch_signu['nom']." ".$fetch_signu['prenom']; ?></td>
												       <?php  $oid=$fetch_offrande['oid']; ?>
												      	<td class="text-center" style="vertical-align:middle"><a href="javascript:val( <?php echo $oid; ?>)" title="Valider l'entrée" style="color:red; " ><button type="button" id="valider" name="valider" class="btn btn-success">Valider</button></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:rej(<?php echo $oid;?>)" title="Rejeter l'entrée" style="color:red; " ><button type="button" id="Rejeter" name="rejeter" class="btn btn-danger">Rejeter</button></a></td>
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

												    
