<?php 

	//Setting Header to Json
	header('Content-Type: application/json');

	//Database Connection
	include "../include/dba.php";

	$query = "SELECT temperature, liquid_level, voltage_input, voltage_output, TIME(inserted_time) AS inserted_time FROM parameters";

	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "QUERY FAILED";
	}

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	mysqli_close($conn);

	print json_encode($data);





?>