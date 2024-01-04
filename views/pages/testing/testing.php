<?php
// Assuming you have a connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_data_show";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo 'connected';
}

// Sample data with spaces, tabs, and line breaks
$sampleData = "This is some text\nwith line breaks\tand tabs.";

// Escape special characters before inserting into the database
$escapedData = $conn->real_escape_string($sampleData);
if(isset($_GET['insert_data'])){
    
// Insert the data into the database
$sql = "INSERT INTO `data` (`data_name`) VALUES ('$escapedData')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>


<?php
// Assuming you have a connection to your MySQL database

// Fetch data from the database
$sql = "SELECT  * FROM data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Decode HTML entities and preserve line breaks for display
        $decodedData = nl2br(htmlspecialchars($row["data_name"]));
        echo "<textarea rows='10' cols='50'>" . $decodedData . "</textarea>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
