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
		   			$date_out=$con->query("select distinct extract(year from date) as year , extract(month from date) as month FROM dime where signataire_un is NOT NULL  and signataire_deux is NOT NULL and signataire_trois!='-' and signataire_trois is NOT NULL ORDER BY date desc;");
		   			$count_date=$date_out->rowCount();
		   			?>
		   
			   			
			  
	</head>

					

	<body>




									<div class="panel-body">

											  	<div class="table-responsive">
											  	<table class="table table-striped table-condensed table-hover" id='tabone'>
											  		<thead>
												      <tr>
												        <th></th>
												      </tr>
												    </thead>
												    <tbody>
												    	<?php
													    	for($i=0; $i<$count_date; $i++){
															$fetch_date=$date_out->fetch();
															$date_q = $fetch_date['year']."-".$fetch_date['month'];
													    		?>
												      <tr>
												        <td><a href="dimes_stat.php?date=<?php echo $date_q; ?>&id=<?php echo $id; ?>"><?php echo $date_q ; ?> </a></td>
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