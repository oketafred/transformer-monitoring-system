<?php 

	include "../include/dba.php";

	$query = "SELECT * FROM parameters ORDER BY parameter_id DESC LIMIT 0, 1";

	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "QUERY FAILED";
	}

	while ($row = mysqli_fetch_array($result)) {
		
		$temperature = $row["temperature"];
		echo $liquid_level = $row["liquid_level"];
		$voltage_input = $row["voltage_input"];
		$voltage_output = $row["voltage_output"];

	}




 ?>

 