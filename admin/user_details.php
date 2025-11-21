<?php
	//session_start();
	include 'connect.php';
	if(isset($_POST['delete'])) {
		$offsetDelete = htmlspecialchars($_POST['delete']);
		$query_regd = "SELECT `Regd` FROM `user_details` ORDER BY `Regd` ASC LIMIT 1 OFFSET ".mysqli_real_escape_string($con, $offsetDelete-1);
		$query_regd_result = mysqli_query($con, $query_regd);
		while($row = mysqli_fetch_assoc($query_regd_result)) {
			$regd = $row['Regd'];
		}
		$query_delete = "DELETE FROM `user_details` WHERE `Regd` = ".$regd;
		if(mysqli_query($con, $query_delete)) {
			// echo 'Success';
			// echo '<script>alert("hello");</script>';
		} else {
			echo 'Failure user_details';
		}

		$query_round_2_answer = "SELECT * FROM `round_2_answer` WHERE `Regd` = ".$regd;
		$query_result_round_2_answer = mysqli_query($con, $query_round_2_answer);
		$num_rows_round_2 = mysqli_num_rows($query_result_round_2_answer);
		if($num_rows_round_2 == 1) {
			$query_delete_round_2_answer = "DELETE FROM `round_2_answer` WHERE `Regd` = ".$regd;
			if(mysqli_query($con, $query_delete_round_2_answer)) {

			} else {
				echo "Failure round_2_answer";
			}
		}

		$query_round_1_answer = "SELECT * FROM `round_1_answer` WHERE `Regd` = ".$regd;
		$query_result_round_1_answer = mysqli_query($con, $query_round_1_answer);
		$num_rows_round_1 = mysqli_num_rows($query_result_round_1_answer);
		if($num_rows_round_1 == 1) {
			$query_delete_round_1_answer = "DELETE FROM `round_1_answer` WHERE `Regd` = ".$regd;
			if(mysqli_query($con, $query_delete_round_1_answer)) {

			} else {
				echo 'Failure round_1_answer';
			}
			$query_scoreboard_delete = "DELETE FROM `scoreboard` WHERE `Regd` = ".$regd;
			if(!mysqli_query($con, $query_scoreboard_delete)){
				echo 'Failure scoreboard';
			}
		}
	}
	// if(isset($_POST['update'])) {
	// 	$offsetUpdate = htmlspecialchars($_POST['update']);
	// 	$query_regd = "SELECT `Regd` FROM `user_details` ORDER BY `Regd` ASC LIMIT 1 OFFSET ".mysqli_real_escape_string($con, $offsetUpdate-1);
	// 	//echo 'update = '.$offsetUpdate;
	// }
	$query = "SELECT * FROM `user_details`";
	$query_result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Details</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	$num_rows = mysqli_num_rows($query_result);
	if($num_rows > 0) {
		?>
		<table class="table table-hover table-striped">
			<thead style="background-color: #000; color: #fff;">
				<tr>
					<th>Sl No.</th>
					<th>Registration No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Password</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$count = 0;
					while($row = mysqli_fetch_assoc($query_result)) {
						$count++;
						echo '<tr>';
							echo '<td>'.$count.'</td>';
							echo '<td>'.$row['Regd'].'</td>';
							echo '<td>'.$row['Name'].'</td>';
							echo '<td>'.$row['Email'].'</td>';
							echo '<td>'.$row['Mobile'].'</td>';
							echo '<td>'.$row['Password'].'</td>';
							echo '<form action="user_details.php" method="POST">';
								echo '<input type="hidden" name="delete" value="'.$count.'" />';
								echo '<td><button type="submit" class="btn btn-danger">Delete</button></td>';
							echo '</form>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
		<?php

	} else {
		echo 'No Students Registred.';
	}
	?>
</body>
</html>