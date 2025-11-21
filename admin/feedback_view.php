<?php
	session_start();
	include 'connect.php';
	if(!isset($_SESSION['mode'])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Feedback</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<table class="table table-striped table-hover" width="100%">
			<thead style="background-color: #000; color: #fff;">
				<tr>
					<th>Sl No.</th>
					<th>Regd No.</th>
					<th>Name</th>
					<th>Feedback</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `feedback_details`";
					$query_result = mysqli_query($con, $query);
					$count = 0;
					while($row = mysqli_fetch_assoc($query_result)) {
						$count++;
						$queryName = "SELECT `Name` FROM `user_details` WHERE `Regd` = '".mysqli_real_escape_string($con, $row['Regd'])."'";
						$queryName_result = mysqli_query($con, $queryName);
						$rowName = mysqli_fetch_assoc($queryName_result);
						echo '<tr>';
							echo '<td>'.$count.'</td>';
							echo '<td>'.$row["Regd"].'</td>';
							echo '<td>'.$rowName["Name"].'</td>';
							echo '<td>'.$row['feedback'].'</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>