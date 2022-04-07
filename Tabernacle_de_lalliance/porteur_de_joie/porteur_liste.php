<?php
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];
$out_porteur=$con->query("select * from porteur order by pid desc;") or die (print_r($con->errorInfo()));
$count_porteur=$out_porteur->rowCount();

?>				

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">

		  
	</head>

					

	<body>
			

		   											
		   											<div class="panel-body">
		   											<p>
		   												<b>NB:</b> Le nom d'utilisateur pour tous les comptes est <b>PorteurDeJoie</b>.
											  		</p><br/>
											  	<div class="table-responsive">
												    <table class="table table-striped table-condensed table-hover" id="tab_1">
											  	
												    <thead>
												      <tr>
												        <th class="text-center">Nom</th>
												        <th class="text-center">Prenom</th>
												        <th class="text-center">Telephone</th>
												        <th class="text-center">Email</th>
												        <th class="text-center"> </th>
												        <th class="text-center"> </th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_porteur; $i++){
															$fetch_porteur=$out_porteur->fetch();
													    		?>
												      <tr>
												        <td class="text-center"><?php echo $fetch_porteur['nom'];?></td>
												        <td class="text-center"><?php echo $fetch_porteur['prenom'];?></td>
												        <td class="text-center"><?php echo $fetch_porteur['tel'];?></td>
												        <td class="text-center"><?php echo $fetch_porteur['email'];?></td>
												      	<td class="text-center" style="vertical-align:middle"><a href="modifier_porteur.php?pid=<?php echo $fetch_porteur['pid']; ?>" title="modifier le compte" style="color:orange; " ><span class="glyphicon glyphicon-edit"></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_pid(<?php echo $fetch_porteur['pid']; ?>)" title="Supprimer le compte" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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

												    
