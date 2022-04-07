<?php  
include_once("../sessions/session_tresorier.php");
require_once("../setup/connection.php");
$bid=$_SESSION['bid'];
$treso=$_SESSION['tresorier'];
$date_out=$con->query("select distinct extract(year from date) as year , extract(month from date) as month FROM depense where tresorier='$treso' and administrateur!='-' and administrateur!='non' and branche='$bid'  ORDER BY date desc;") or die (print_r($con->errorInfo()));
$count_date=$date_out->rowCount();
?>

<!DOCTYPE html>
<html>

	<head>
		
			
   			<link rel="stylesheet" type="text/css" href="../data_table/media/css/jquery.dataTables.min.css">	   			
			  
	</head>

					

	<body>
												<div class="panel-body">
											  	<div class="table-responsive">
											  	<table class="table table-striped table-condensed table-hover" id="tab1">
											  		<thead>
												      <tr>
												        <th class="text-center"></th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_date; $i++){
															$fetch_date=$date_out->fetch();
															$date_q = $fetch_date['year']."-".$fetch_date['month'];
													    		?>
												      <tr>
												        <td><a href="depenses_stat.php?date=<?php echo $date_q; ?>"><?php echo $date_q ; ?> </a></td>
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
    $('#tab1').dataTable();
	});
	</script>

</html>