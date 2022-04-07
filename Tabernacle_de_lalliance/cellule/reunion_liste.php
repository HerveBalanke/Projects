<?php  
include_once("../sessions/session_cellule.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$cellule=$_SESSION['cellule'];
$zone_cel=$_SESSION['zone_cel'];
$out_reunion=$con->query("select * from reunion inner join cellule on reunion.cellule=cellule.cid where zone_cel='$zone_cel' order by rid desc;") or die (print_r($con->errorInfo()));
$count_reunion=$out_reunion->rowCount();
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
												        <th class="text-center">Theme</th>
												        <th class="text-center">Date</th>
												        <th class="text-center"> </th>
												        <th class="text-center"> </th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_reunion; $i++){
															$fetch_reunion=$out_reunion->fetch();
													    		?>
												      <tr>
												        <td class="text-center"><a href="fiche_reunion.php?rid=<?php echo $fetch_reunion['rid']; ?>"><?php echo $fetch_reunion['theme'];?> </a></td>
												        <td class="text-center"><?php echo $fetch_reunion['date'];?></td>
												      	<td class="text-center" style="vertical-align:middle"><a href="modifier_reunion.php?rid=<?php echo $fetch_reunion['rid']; ?>" title="modifier la réunion" style="color:orange; " ><span class="glyphicon glyphicon-edit"></a></td>
									       				<td class="text-center" style="vertical-align:middle"><a href="javascript:sup_rid(<?php echo $fetch_reunion['rid']; ?>)" title="Supprimer la réunion" style="color:red; " ><span class="glyphicon glyphicon-remove"></span></a></td>
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

												    
