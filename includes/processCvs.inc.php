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
				<a href="/upload.html">Upload</a>
				<a href="/contact">Contact</a>
		</nav>		
	</body>
	<footer>
		
	</footer>
</html>
<?php
//Include connection file
include_once "conn.inc.php";
//db connection 
$link = createConn();
//if the form is set
if (isset($_POST['submit'])) {
	//if form set and file uploaded
    if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    	//if the file is not a csv
    	$allowed =  array('csv');
		$filename1 = $_FILES['fileToUpload']['name'];
		$ext = pathinfo($filename1, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed) ) {
			echo "Uploaded file is not a .csv! Returning to upload page.";
			header( "refresh:3;url=upload.html" );
			return;
		}
    	//Display file upload success
        echo "<h1>" . "File ". $_FILES['fileToUpload']['name'] ." uploaded successfully." . "</h1>";
		//if error
		if($_FILES["fileToUpload"]["error"] > 0){
	    	echo "Error: " . $_FILES["fileToUpload"]["error"] . "<br>";
		} 
		//display file info
		else{
		    echo "<br>" . "File Name: " . $_FILES["fileToUpload"]["name"] . "<br>";
		    echo "File Type: " . $_FILES["fileToUpload"]["type"] . "<br>";
		    echo "File Size: " . ($_FILES["fileToUpload"]["size"] / 1048576) . " MB<br>";
		    echo "Stored in: " . $_FILES["fileToUpload"]["tmp_name"] . "<br>" . "<br>";
		}
    }
	
}




?>