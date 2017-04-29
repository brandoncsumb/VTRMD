<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>CVS Processed</title>
		<meta name="description" content="">
		<meta name="author" content="Brandon Saletta">
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>
	<style>
		body{
		  background: rgba(0,0,0,0.9);
		  color: #FFFFFF;
		}
		.nav {
		    display: inline-block;    
		    float: left;               
		    vertical-align: top;
		    margin-bottom: 4px;
		    overflow: hidden;
		    box-shadow: 0 0 2px #888;
		}
		h1{
		  width: 100%;
		  
		  color: #ffffff;
		  font-family: Arial;
		}
		h2{
		  width: 100%;
		  color: #ffffff;
		  font-family: Arial;
		}
		h3{
		  width: 100%;
		  color: #ffffff;
		  font-family: Arial;
		}
		h4{
		  width: 100%;
		  color: #ffffff;
		  font-family: Arial;
		}
		h5{
		  width: 100%;
		  color: #ffffff;
		  font-family: Arial;
		}
		p{
		  width: 100%;
		  height: 100%;
		  color: #ffffff;
		  font-family: Arial;
		}
		#but{
		  margin: 0;
		  color: #fff;
		  background: #16a085;
		  border: none;
		  width: 508px;
		  height: 35px;
		  margin-top: -20px;
		  margin-left: -4px;
		  border-radius: 4px;
		  border-bottom: 4px solid #117A60;
		  transition: all .2s ease;
		  outline: none;
		  opacity: 100;
		}
		a{
		  text-align: center;
		  color: #ffffff;
		  font-family: Arial;
		}
		h1 span {
		  text-decoration: underline;
		}
		h2 span {
		  text-decoration: underline;
		}
		h3 span {
		  text-decoration: underline;
		}
		h4 span {
		  text-decoration: underline;
		}
		h5 span {
		  text-decoration: underline;
		}
		 span {
		 	color: #595959;
		  text-decoration: underline;
		}
	</style>
	<body>
		<nav>
				<a href="../cvs_upload.html">Upload</a>
				<a href="/contact">Contact</a>
		</nav>		
	</body>
	<footer>
		
	</footer>
</html>
<?php
//Include connection file
include_once "conn.inc.php";
include_once "appDataAccess.inc.php";
//db connection 
$link = createConn();
//if the form is set
if(!isset($_FILES['fileToUpload']) || $_FILES['fileToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "<br><h3>Error no file selected!</h3>"; 
	return;
}
if (isset($_POST['submit'])) {
	//if form set and file uploaded
    if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    	//if the file is not a csv
    	$allowed =  array('csv');
		$filename1 = $_FILES['fileToUpload']['name'];
		$ext = pathinfo($filename1, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) {
			echo "<br><h3>Uploaded file is not a .csv! Returning to upload page.</h3>";
			header( "refresh:3;url=../cvs_upload.html" );
			return;
		}
    	//Display file upload success
        echo "<h1>" . "File uploaded successfully." . "</h1>";
		//if error
		if($_FILES["fileToUpload"]["error"] > 0){
	    	echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br>";
		} 
		//display file info
		else{
		    echo "File Name: " . $_FILES["fileToUpload"]["name"] . "<br>";
		    echo "File Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
		    echo "File Size: " . ($_FILES["fileToUpload"]["size"] / 1048576) . " MB<br>";
		    echo "Stored in: " . $_FILES["fileToUpload"]["tmp_name"] . "<br>" . "<br>";
		}
    }
	//Grab the Uploaded File
    $handle = fopen($_FILES['fileToUpload']['tmp_name'], "r",true);
	$row = 0;
	$data_raw_csv;
	$row_count_1 = 0;
	$row_count_2 = 0;
	$row_count_3 = 0;
	$row_count_4 = 0;
	$badrowcount = 0;
	while($data = fgetcsv($handle, ',')){
		if (count($data) == 123){
		    $row++;
		    if($row > 1){
			//Insert into database
			$result_data = array();
			$result_location = array();
			$result_data = insertCalSpeedData($data);
			$result_location = insertLocation($data[1],$data[3],$data[10],$data[11]);
			$row_count_1 += $result_data['data_rows_inserted'];
			$row_count_2 += $result_data['data_rows_updated'];
			$row_count_3 += $result_location['data_rows_inserted'];
			$row_count_4 += $result_location['data_rows_updated'];
			}
		}
		else{
			$badrowcount += 1; 
			$badrowref = $row + 1;
		}
	}
	if($badrowcount > 0){
		echo $badrowcount . " of the rows in the provided data set has a missing value! <br><br>";
		echo "The error is located around row " . $badrowref . "!";
	}
	echo "<h4><b>In the table '" . $result_data['db_name'] . " ', " . $row_count_1 . " row(s) were inserted and " . $row_count_2 . " row(s) were updated!</h4></b><br>";
	echo "<h4><b>In the table '" . $result_location['db_name'] . " ', " . $row_count_3 . " row(s) were inserted and " . $row_count_4 . " row(s) were updated!</h4></b><br><br>";
	fclose($handle);}
?>







