<!DOCTYPE html>
<html>

		<head>
							<meta charset='utf-8'/>
							
							<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1"> -->
								<title> FIIS</title>
								<link type='text/css' rel='stylesheet' href='../CSS/view_staff.css'/>
				 <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
		
		</head>
		
		<body>
				<header>
					<nav class="navbar navbar-inverse ">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">FIIS</a>
					</div>
					<ul class="nav navbar-nav">
					  <li class="active"><a href="registration.php">Registration</a></li>
					  <li><a href="view_staff.php">View Staff</a></li>
					  <!--<li><a href="#">Page 2</a></li> 
					  <li><a href="#">Page 3</a></li> -->
					</ul>
				 
				</nav>		
				
				</header>
				
				<?php
						
					try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}
						
						$out=$cons->query("select * from nurse") or die (print_r($out->errorInfo()));
						$row= $out-> rowCount();
						
						
						
				
				?>
				
				
				
				
				
							<section>
							<h1> Staff Members</h1>
							<br/>
								
							<form class="form-inline" role="form" action="view_staff.php" method="POST">
							<label for="search">Filter by</label>
							<select class="combobox">
							  <option></option>
							  <option value="PA">Pennsylvania</option>
							  <option value="CT">Connecticut</option>
							  <option value="NY">New York</option>
							  <option value="MD">Maryland</option>
							  <option value="VA">Virginia</option>
							</select>&nbsp;&nbsp;

							<script type="text/javascript">
							  $(document).ready(function(){
								$('.combobox').combobox();
							  });
							</script>
							
								  <input class="form-control form-inline" id="search" type="text">
								  <button type="button" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-search"></span> Search 
							</button>
							
							</form>
							<br/><br/><br/>
							
							
							<table class="table table-hover table-striped">
								<thead>
								  <tr>
									<th>Firstname</th>
									<th>Lastname</th>
									<th>Telephone</th>
									<th>Email</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Delete</th>
								  </tr>
								</thead>
								<tbody>
								
								
						<?php	
						
								for($i=0; $i<$row; $i++){ 
								$list=$out->fetch();
						?>
					
								  <tr>
									<td><a href="view.php?id=<?php print $list["nid"]; ?>"><?php print $list["fname"]; ?> </a> </td>
									<td><a href="view.php?id=<?php print $list["nid"]; ?>"><?php print $list["lname"]; ?> </a> </td>
									<td><?php print $list["tel"]; ?> </td>
									<td><?php print $list["email"]; ?>  </td>
									<td><?php print $list["hsenumber"]." ".$list["stname"]." ".$list["city"] ;?></td>
									<td ><a href="#"><span class="glyphicon glyphicon-edit"></span></a></td>
									<td><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
								  </tr>
								 
						<?php	  
								  }
						?>
								
								</tbody>
							  </table>

				</section>
				 <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
	<script type="text/javascript">
		
$('table.table-hover').each(function() {
    var currentPage = 0;
    var numPerPage = 15;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
        $('<span class="page-number"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('active').siblings().removeClass('active');
        }).appendTo($pager).addClass('clickable');
    }
    $pager.insertBefore($table).find('span.page-number:first').addClass('active');
});
				  
	</script>	
				
				<footer>
							<h5> &copy; FIIS 2015</h5>
				
				</footer>
		
		</body>

</html>