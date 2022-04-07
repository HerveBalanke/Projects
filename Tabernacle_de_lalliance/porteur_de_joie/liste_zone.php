<?php  
include_once("../sessions/session_pjr.php");
require_once("../setup/connection.php");
$pjr=$_SESSION['pjr'];
$zone_out=$con->query("select distinct zone.zone, zone.zid FROM evangelisation inner join zone on zone.zid=evangelisation.zone;") or (print_r($cons->errorInfo()));
$count_zone=$zone_out->rowCount();
?>			

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">
  
	</head>

					


									<div class="panel-body">

											  	<div class="table-responsive">
											  	<table class="table table-striped table-condensed table-hover" id='tab_1'>
											  		<thead>
												      <tr>
												        <th></th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_zone; $i++){
															$fetch_zone=$zone_out->fetch();
													    		?>
												      <tr>
												        <td><a href="liste_complete.php?zone=<?php echo $fetch_zone['zid']; ?>"><?php echo $fetch_zone['zone'] ; ?> </a></td>
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