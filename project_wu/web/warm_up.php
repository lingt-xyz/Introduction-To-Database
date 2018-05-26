<?php 
	$title = "Warm-up Project";
	$sub_title = $title;
?>
<?php include 'header.php';?>
<div class="container">
	<div class="row">
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

		// get all the tables
		$table_array = array();
		$sql = "SHOW TABLES";
		$result = $conn->query($sql);
		$num_rows = $result->num_rows;

		/*
		<div class="col-6 col-sm-3 placeholder">
			<img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
			<h4>Label</h4>
			<div class="text-muted">Something else</div>
		</div>
		*/
		echo "<table class='table'><tr>";
		while($row = $result->fetch_array()) {
			if(preg_match("#^(Tl|Zr)(.*)$#i", $row[0]) == 0){
				echo "<td><div><h3><a href='./warm_up.php?tableName=" . $row[0] . "'>" . $row[0] . "</a></h4></div></td>";
			}
		}
		echo "</tr></table>";
		$conn->close();
	?>

            
          
          <div class="table-responsive">
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
			if (empty($_GET)) {
				// get all the tables
				$table_array = array();
				$sql = "SHOW TABLES";
				$result = $conn->query($sql);
				$num_rows = $result->num_rows;
				if ($result->num_rows > 0) {
					//echo "<table class='table table-hover'><tr><th>TableName</th></tr>";
					while($row = $result->fetch_array()) {
						if(preg_match("#^(Tl|Zr)(.*)$#i", $row[0]) == 0){
							array_push($table_array, $row[0]);
							//echo "<tr><td>" . $row[0]. "</td></tr>";
						}else{
							$num_rows--;
						}
					}
					//echo "<tr><td>" . $num_rows . " results" . "</td></tr>";
					//echo "</table>";
				} else {
					//echo "0 results";
				}
				// print_r($table_array);
				// get fields from every table

				$arrlength = count($table_array);
				for($index = 0; $index < $arrlength; $index++) {
					$table_name = $table_array[$index];
					echo "<H3>" . $table_name ."</H3>";
					$sql = "SELECT * FROM " . $table_name;
					$result = $conn->query($sql);
					echo "<table class='table table-hover'><tr>";
					$row_num = 0;
					while($finfo = $result->fetch_field()) {
						$row_num++;
						echo "<th>" . $finfo->name. "</th>";
					}
					echo "</tr>";
					$sql = "SELECT * FROM " . $table_name;
					$result = $conn->query($sql);
					$num_rows = $result->num_rows;
					if ($result->num_rows > 0) {
						while($row = $result->fetch_array()) {
							echo "<tr>";
							for($_num = 0; $_num < $row_num; $_num++){
								echo "<td>" . $row[$_num]. "</td>";
							}
							echo "</tr>";					
						}
						echo "<tr><td colspan=" . $row_num . ">" . $num_rows . " results" . "</td></tr>";
					} else {
						echo "<tr><td colspan=" . $row_num . "> 0 results.</td></tr>";
					}
					echo "</table>";
				}

			}else{
				$table_name = $_GET["tableName"];

				// get fields from every table
			
				echo "<H3>" . $table_name ."</H3>";
				$sql = "SELECT * FROM " . $table_name;
				$result = $conn->query($sql);
				echo "<table class='table table-striped'><tr>";
				$row_num = 0;
				while($finfo = $result->fetch_field()) {
					$row_num++;
					echo "<th>" . $finfo->name. "</th>";
				}
				echo "</tr>";
				$sql = "SELECT * FROM " . $table_name;
				$result = $conn->query($sql);
				$num_rows = $result->num_rows;
				if ($result->num_rows > 0) {
					while($row = $result->fetch_array()) {
						echo "<tr>";
						for($_num = 0; $_num < $row_num; $_num++){
							echo "<td>" . $row[$_num]. "</td>";
						}
						echo "</tr>";					
					}
					echo "<tr><td colspan=" . $row_num . ">" . $num_rows . " results" . "</td></tr>";
				} else {
					echo "<tr><td colspan=" . $row_num . "> 0 results.</td></tr>";
				}
				echo "</table>";
			}
			$conn->close();
		?>
          </div>
      </div>
    </div>
<?php include 'footer.php';?>
