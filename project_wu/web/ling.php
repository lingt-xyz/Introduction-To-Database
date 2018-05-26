<?php 
	$title = "Ling's MySQL Demo";
	$sub_title = "Ling's MySQL Demo";
?>
<?php include 'header.php';?>
<div class="container">
		<?
			$servername = "*.encs.concordia.ca";
			$username = "*";
			$password = "*";
			$dbname = "*";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT CID, CName, NoOfCredits FROM TlCourse";
			$result = $conn->query($sql);
			$num_rows = $result->num_rows;
			if ($result->num_rows > 0) {
			// output data of each row
				echo "<table class='table table-hover'><tr><th>CourseID</th><th>CourseName</th><th>Credits</th></tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["CID"]. "</td><td>" . $row["CName"]. "</td><td>" . $row["NoOfCredits"]. "</td></tr>";
				}
				echo "<tr><td colspan='3'>" . $num_rows . " results" . "</td></tr>";
				echo "</table>";
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
</div>
<?php include 'footer.php';?>
