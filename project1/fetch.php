 <?php
$servername = "localhost";
$username = "root";
$password = "Pr@teek4";
$dbname = "test";
$name = $_POST['name'];
$pass = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Name, Password FROM table1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["Name"]==$name && $row["Password"]==$pass){
    echo "<tr><td>".$row["Name"]."</td><td>".$row["Password"]." ""</td></tr>";
  }
}
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?> 
