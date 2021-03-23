

<?php



    $username = "is3r1us_readme";

    $password = "SilahkanMasuk";

    $dbname = "is3r1us_readme";



// Create connection

$conn = new mysqli('',$username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} 



$sql = "SELECT TimeStamp, nama, uid FROM logs";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

    // output data of each row

	$obj = array();

    while($row = $result->fetch_assoc()) {

		$element = array($row["TimeStamp"],$row["nama"],$row["uid"]);

       	array_push($obj,$element);

	}

	echo json_encode($obj);

} else {

    echo "0 results";

}

$conn->close();

?>



