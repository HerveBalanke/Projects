<?php 
session_start ();

if (!isset($_SESSION["admin"]) || (trim($_SESSION["admin"]=='')))
{
header('location:../index.php');
exit();

}
?>
<?php

/*Include the `fusioncharts.php` file that contains functions
	to embed the charts.
*/
  include("../JS/wrappers 2/php-wrapper/fusioncharts.php");

  /* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */

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

     	// Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT * from vaccine";

     	// Execute the query, or else return the error message.
     	$result = $cons->query($strQuery) or die(print_r($result->errorInfo()));

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
                "chart" => array(
                    "caption" => "Top 10 Most Populous Countries",
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

        	while($row = $result->fetch()) {
           	array_push($arrData["data"], array(
                "label" => $row["vname"],
                "value" => $row["qty"],
				"showValues"=> "0"
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

        	/*Create an object for the column chart. Initialize this object using the FusionCharts PHP class constructor. The constructor is used to initialize the chart type, chart id, width, height, the div id of the chart container, the data format, and the data source. */
			new FusionCharts("type of chart", 
			"unique chart id", 
			"width of chart", 
			"height of chart", 
			"div id to render the chart", 
			"type of data", 
			"actual data");
        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
        	$cons=null;

     	}

  	?>
  	<div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
</html>