<?php
	$conn= new mysql("localhost","prateek","","admin_panel");
	 if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
	?>