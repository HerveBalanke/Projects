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
		   			$out_culte_c=$con->query("select * from evenement group by evenement;") or die(print_r($con->errorInfo()));
		   			$count_culte_c=$out_culte_c->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>
									<div class="panel-body">

											  	<div class="table-responsive">
											  	<table class="table table-striped table-condensed table-hover" id="tabone">
											  		<thead>
												      <tr>
												        <th></th>
												        <!-- <th></th> -->
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_culte_c; $i++){
															$fetch_culte_c=$out_culte_c->fetch();
													    		?>
												      <tr>
												        <td><a href="offrande_stat.php?culte=<?php echo $fetch_culte_c['eid']; ?>&id=<?php echo $id; ?>"><?php echo $fetch_culte_c["evenement"]; ?> </a></td>
												        <!-- <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_eid(<?php //echo $fetch_culte_c["eid"]; ?>)" title="Supprimer" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td> -->
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
    $('#tabone').dataTable();
	});
	</script>

</html>
