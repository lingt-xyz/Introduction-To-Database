<?php 
	$title = "MySQL Interface";
	$sub_title = $title;
?>
<?php include 'header.php';?>
<div class="container">
  <h2>Please make Your choice:</h2>
  <p>Though Data Definition is supported, it's <strong>NOT</strong> recommended to do it through this interface.</p>
  <form  action="./mysql.php" method="post">
    <div class="form-group">
      <label class="radio-inline"><input type="radio" name="mysql_choice" value="DDL">DDL</label>
      <label class="radio-inline"><input type="radio" name="mysql_choice" value="DML" checked>DML</label>
    </div>
    <div class="form-group">
      <div id="mysql_ddl_group">
	<label class="radio-inline"><input type="radio" name="mysql_ddl" value="create" checked>CREATE</label>
	<label class="radio-inline"><input type="radio" name="mysql_ddl" value="alter">ALTER</label>
      </div>
      <div id="mysql_dml_group">
	<label class="radio-inline"><input type="radio" name="mysql_dml" value="select" checked>SELECT</label>
	<label class="radio-inline"><input type="radio" name="mysql_dml" value="insert">INSERT</label>
	<label class="radio-inline"><input type="radio" name="mysql_dml" value="update">UPDATE</label>
	<label class="radio-inline"><input type="radio" name="mysql_dml" value="delete">DELETE</label>
      </div>
    </div>
    <div class="form-group">
      <textarea class="form-control" rows="5" id="mysql" name="mysql"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<div class="container top30">
	<div class="row">
		<div class="col-sm-12">
			<p>
				<?
					if(!empty($_POST)){
						echo $_POST["mysql"];
					}
				?>
			</p>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?
			if(!empty($_POST)){
/* for more precise operations. Right now we make it TODO, may implement it in a future version.
				$mysql_choice = $_POST["mysql_choice"]; // is it a DDL or DML?
				if($mysql_choice == "DDL"){// ResultSet should be boolean (not always, e.g. "SHOW TABLES;")
					$mysql_ddl = $_POST["mysql_dml"];
				}else{// ResultSet depends
					$mysql_dml = $_POST["mysql_dml"];
					if($mysql_dml == "select"){
						$show_table = true;
					}else if($mysql_dml == "insert"){
					}else if($mysql_dml == "update"){
					}else{//delete
					}
				}
*///end of TODO
				
				// connect to the database
			  	$servername = "*.encs.concordia.ca";
				$username = "*";
				$password = "*";
				$dbname = "*";
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$sql = $_POST["mysql"]; // what the user has given to us?
				$result = $conn->query($sql);
				echo "<table class='table table-striped'><tr>";
				if(preg_match("#^(SHOW|SELECT|DESC)(.*)$#im", $sql) != 0){ // "SHOW TABLES" or "SELECT" or "DESC", case in-sensitive
					$num_rows = $result->num_rows; // how many tuples do we have?
					$num_fields = $result->field_count; // how many attributes do we have?
					$head_done = false; // we only want to show field name (in the table as table head) once.
					while($row = $result->fetch_assoc()) {
						if(!$head_done){ // let show table head
							$head_row = "<tr>";
							$first_body_row = "<tr>";
							foreach ($row as $key => $val) {
								$head_row .=  ("<td>" . $key."</td>");
								$first_body_row .=  ("<td>" . $val."</td>");
							}
							$head_row .= "</tr>";
							$first_body_row .= "</tr>";
							echo $head_row . $first_body_row;
							$head_done = true;
						}else{// show table body
							echo "<tr>";
							foreach ($row as $key => $val) {
								echo "<td>" . $val. "</td>";
							}
							echo "</tr>";
						}					
					}
					echo "<tr><td colspan=" . $num_fields . ">" . $num_rows . " results" . "</td></tr>";
				}else{
					if($result){
						echo "<tr><td>Done!</td></tr>";
					}else{
						echo "<tr><td>Something went wrong!</td></tr>";
					}
				}
				echo "</table>";
				$conn->close();
/*
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
*/
			}else{

			}
			?>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
