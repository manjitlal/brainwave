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
	<title>Leaderboard</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<table class="table table-striped table-hover">
			<thead style="background-color: #000; color: #fff;">
				<tr>
					<th>Sl No.</th>
					<th>Regd No.</th>
					<th>Name</th>
					<th>Chatter Box</th>
					<th>Jumbled Box</th>
					<th>Quiz Bee</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `scoreboard` ORDER BY `Total` DESC";
					$query_result = mysqli_query($con, $query);
					$count = 0;
					while($row = mysqli_fetch_assoc($query_result)) {
						$count++;
						echo '<tr>';
							echo '<td>'.$count.'</td>';
							echo '<td>'.$row["Regd"].'</td>';
							$queryName = "SELECT `Name` FROM `user_details` WHERE `Regd` = '".$row['Regd']."'";
							$queryName_result = mysqli_query($con, $queryName);
							$rowN = mysqli_fetch_assoc($queryName_result);
							echo '<td>'.$rowN["Name"].'</td>';
							echo '<td>'.$row['Round_1'].'</td>';
							echo '<td>'.$row['Round_2'].'</td>';
							echo '<td>'.$row['Round_3'].'</td>';
							echo '<td>'.$row['Total'].'</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>