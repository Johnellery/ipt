<?php

require_once "connection.php";
$query = "SELECT name, gender, address, designation, age FROM developers LIMIT 10";
$result = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
$records = array();
while( $rows = mysqli_fetch_assoc($result) ) {
	$records[] = $rows;
}	


if(isset($_POST["export_csv_data"])) {	
	$csv_file = "phpzag_csv_export_".date('Ymd') . ".csv";			
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=\"$csv_file\"");	
	$fh = fopen( 'php://output', 'w' );
	$is_coloumn = true;
	if(!empty($records)) {
	  foreach($records as $record) {
		if($is_coloumn) {		  	  
		  fputcsv($fh, array_keys($record));
		  $is_coloumn = false;
		}		
		fputcsv($fh, array_values($record));
	  }
	   fclose($fh);
	}
	exit;  
}

?>