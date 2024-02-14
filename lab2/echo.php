<?php

// Checking if data parameter is set to a value or not
$data1 = $_REQUEST['data'];
if(isset($data1)) {
   $data1 = trim($data1, " "); // Remove prefix and suffix whitespaces of input
   $data1 = stripslashes($data1); // Removing the backslashes 
   // Converting the special characters to HTML entities which is data encoding
   $data1 = htmlentities($data1); 
   //$script_check = strpos($data1, "script");
   //echo $script_check;

   // Checking for the script tag and alert in the input
	if (strpos($data1, "script") != 0 || strpos($data1, "alert") != 0 ) {
		$warn_st = "scripts or alert are not allowed in the input";
    	//echo "scripts or alert's are not allowed in the input";
    	$warn_st = htmlentities($warn_st);
    	echo $warn_st;
    	return;
	}
    // Printing the sanitized data
    echo $data1;

	} 
	else {
    // dispalying an error message, if data is not set
    echo "Error: 'data' parameter is missing.";
}
?>