<!DOCTYPE html>
<html>
<head>
	<title>ITP Data NON-NA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="assets/js/main.js" type="text/javascript" ></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.4.4/randomColor.min.js"></script>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js" type="text/javascript"></script>

	<style type="text/css">
		.canvasjs-chart-credit {
			display: none;
		}
	</style>
	<script>
      console.log("%cWhat's up? This area is forbidden.", "background: red; color: yellow; font-size: x-large");

  </script>
	<?php include 'database_retrival.php' ?>
</head>
<body>
</body>
<?php
$query_us_employees_each = "SELECT distinct person, sum(`jan`+ `feb`+ `mar` + `apr`+ `may`+ `jun`+ `jul`+ `aug`+ `sep`+ `oct`+ `nov`+ `dec`) as USEmp FROM `abcd_it_2017` WHERE person NOT IN ( 'Anil Kumar Kunapareddy', 'Kaushik Bangalore Venkatarama', 'David Uhr', 'Balakameswara Sarma Sishta', 'Kishan Vimalachandran', 'Abhishek Anand', 'mr. Mrinal Sarkar') GROUP BY person";

$us_empl_result_each = mysql_query($query_us_employees_each, $conn);

	if (!$us_empl_result_each) { // add this check.
		die('Invalid query: ' . mysql_error());
	}

	echo "<style>
	table {
		border-collapse: collapse;
		width: 60%;
	}

	th, td {
		text-align: left;
		padding: 5px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
		background-color: #F0AB00;
		color: white;
	}
</style>";

echo "<center><table border='1'>
<tr>
<th><b>Person</b></th>
	<th><b>Days</b></th>
</tr>";

while($row = mysql_fetch_array($us_empl_result_each, MYSQL_ASSOC)){
	$url_bind = "person_lookup.php?person=";
	$url_bind .= $row['person'];
	$url_bind .= "&department=ITP";
	echo '<tr><td><a href="' . $url_bind . '">' . $row['person'] . '</a></td><td>' . $row['USEmp'] . '</td></tr>';
}
echo '</table></center>';

?>
</body>
</html>