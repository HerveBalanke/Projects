<?php  
include_once("../sessions/session_secretaire.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];

$groupe=$_GET['groupe'];
$out_membre=$con->query("select * from grou_mem
inner join membre on grou_mem.membre=membre.mid where grou_mem.gid='$groupe' and membre.branche='$bid' order by membre.mid desc;
	") or die (print_r($con->errorInfo()));
$count_membre=$out_membre->rowCount();

$groupe_out=$con->query("select * from groupe
	inner join membre on groupe.leader=membre.mid where groupe.gid='$groupe' and membre.branche='$bid';")or die (print_r($con->errorInfo()));
$groupe_out=$groupe_out->fetch();

$mem_nom=$con->query("select count(membre) as nombre from grou_mem inner join groupe on groupe.gid=grou_mem.gid
	where grou_mem.gid='$groupe' and groupe.branche='$bid';")or die (print_r($con->errorInfo()));
$fetch_nom=$mem_nom->fetch();
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
													        <th class="text-center"> </th>
													        <th class="text-center"> </th>
													      </tr>
													    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_membre; $i++){
															$fetch_membre=$out_membre->fetch();
													    		?>
												      <tr>
												        <td><?php echo $fetch_membre['nom']." ".$fetch_membre['prenom']." - ".$fetch_membre['mid'] ;?></td>
												        <?php $info=$fetch_membre['mid'].'.'.$groupe; 
												        	if($groupe_out['mid']!=$fetch_membre['mid']){
												        ?>

													 <td class="text-center" style="vertical-align:middle"><a href="javascript:sup_id(<?php echo $info; ?>)" style="color:red; " ><span class="glyphicon glyphicon-remove"> </span></a></td>
												      </tr>
												    <?php 
												}else{ ?>
													<td class="text-center"> </td>
												<?php
												}
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
