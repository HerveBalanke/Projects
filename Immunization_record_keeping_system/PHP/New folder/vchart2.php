<?php

 /* Include the `includes/fusioncharts.php` file that contains functions to embed the charts.*/

  include("../JS/wrappers 2/php-wrapper/fusioncharts.php");

  /* The following 4 code lines contains the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */

  try{
							$cons= new PDO("mysql:host=localhost; dbname=FIIS", 'root');
						}catch(PDOexception $e){
							die('ERROR:'.$e->getMessage());
						}

?>
<html>
   <head>
  	<title>FIIS</title>
  	<link  rel="stylesheet" type="text/css" href="css/style.css" />

	  <!--  Include the `fusioncharts.js` file. This file is needed to render the chart. Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors. -->

  	 <script src="../JS/js/fusioncharts.js"></script>
   </head>
   <body>
  	<?php

     	// Get the country code from the GET parameter
     	$countryCode = $_GET["Country"];

     	// Form the SQL query that returns the top 10 most populous cities in the selected country
     	$cityQuery = "SELECT * vaccine WHERE vcode = ? ";

     	// Prepare the query statement
     	$cityPrepStmt = $cons->prepare($cityQuery);


     	// Execute the query
     	$cityPrepStmt->execute(array($countryCode));

     	// Get the results from the query executed
     	//$cityResult = $cityPrepStmt->get_result();

     	// If the query returns a valid response, prepare the JSON string
     	if ($cityPrepStmt) {

        	/* Form the SQL query that will return the country name based on the country code. The result of the above query contains only the country code. The country name is needed to be rendered as a caption for the chart that shows the 10 most populous cities */

        	$countryNameQuery = "SELECT vname from vaccine WHERE vcode = ?";

        	// Prepare the query statement
        	$countryPrepStmt = $cons->prepare($countryNameQuery);

        	// If there is an error in the statement, exit with an error message
        	if($countryPrepStmt === false) {
           	exit("Error while preparing the query to fetch data from Country Table. ".$cons->error);
        	}

        	// Bind the parameters to the query prepared
        	//$countryPrepStmt->bind_param("s", $countryCode);

        	// Execute the query
        	$countryPrepStmt->execute(array($countryCode));

        	// Bind the country name to the variable `$countryName`
        	//$countryPrepStmt->bind_result($countryName);

        	// Fetch the result from prepared statement
        	$countryPrepStmt->fetch();

        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
                "chart" => array(
                    "caption" => "Top 10 Most Populous Cities in ".$countryPrepStmt['vname'],
                    "paletteColors" => "#0075c2",
                    "bgColor" => "#ffffff",
                    "borderAlpha"=> "20",
                    "canvasBorderAlpha"=> "0",
                    "usePlotGradientColor"=> "0",
                    "plotBorderAlpha"=> "10",
                    "showXAxisLine"=> "1",
                    "xAxisLineColor" => "#999999",
                    "showValues"=> "0",
                    "divlineColor" => "#999999",
                    "divLineIsDashed" => "1",
                    "showAlternateHGridColor" => "0"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	while($row = $cityResult->fetch_array()) {
                array_push($arrData["data"], array(
              	"label" => $row["vname"],
              	"value" => $row["qty"]
              	)
           	);
        	}

           /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

      	  /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is `FusionCharts("type of chart", "unique chart id", "width of chart", "height of chart", "div id to render the chart", "data format", "data source")`.*/

        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
        	$con=null;
     	}
  	?>

  	<a href="country.php">Back</a>
  	<div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
</html>