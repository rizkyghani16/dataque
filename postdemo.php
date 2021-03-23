<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";
    $username = "is3r1us_readme";
    $password = "SilahkanMasuk";
    $dbname = "is3r1us_readme";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set('Asia/Jakarta');
    $d = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $t = date("H:i:s");

    if(!empty($_POST['nama']) && !empty($_POST['blok']))
    {
    	$nama = $_POST['nama'];
		$uid = $_POST['uid'];
    	$blok = $_POST['blok'];

	    $sql = "INSERT INTO logs (nama, uid, blok, Date, Time)
		
		VALUES ('".$nama."', '".$uid."', '".$blok."', '".$d."', '".$t."')";

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>