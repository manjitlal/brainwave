<?php
	session_start();
	include 'connect.php';
	if(!isset($_SESSION['mode'])) {
		header('Location: index.php');
	}


	if (isset($_POST['Regd_delete'])) {
		# code...
		$reg=htmlspecialchars($_POST['Regd_delete']);
		if(!empty($reg)){
			$querydelete="delete from round_2_answer where regd='".$reg."' ";
			if(mysqli_query($con,$querydelete)){
				echo '<script type="text/javascript">
						alert("Answer Deleted");
					</script>';
			}
			else{
				echo '<script type="text/javascript">
						alert("Deletion Failed.");
					</script>';
			}
		}
		else{
			echo '<script type="text/javascript">
						alert("Unable to delete");
					</script>';
		}
	}

	if(isset($_POST['marks']) && isset($_POST['Regd'])) {
		$marks = htmlspecialchars($_POST['marks']);
		$regd = htmlspecialchars($_POST['Regd']);
		if(!empty($marks) && !empty($regd)) {
			$queryScore_Update = "UPDATE `scoreboard` SET `Round_2` = '".mysqli_real_escape_string($con, $marks)."' WHERE `Regd` = '".mysqli_real_escape_string($con, $regd)."'";
			if(mysqli_query($con, $queryScore_Update)) {
				// echo '<script type="text/javascript">
				// 	alert("Successfully Updated.");
				// </script>';
				$queryScore_Update_Total = "UPDATE `scoreboard` SET `Total` = '".mysqli_real_escape_string($con, $marks)."' WHERE `Regd` = '".mysqli_real_escape_string($con, $regd)."'";
				if(mysqli_query($con, $queryScore_Update_Total)) {
					// echo '<script type="text/javascript">
					// 	alert("Total Score Updated.");
					// </script>';
				} else {
					echo '<script type="text/javascript">
						alert("Total Score Updation Failed.");
					</script>';	
				}
			} else {
				echo '<script type="text/javascript">
					alert("Updation Failed.");
				</script>';
			}
		} else {
			echo '<script type="text/javascript">
					alert("Marks field cannot be empty.");
				</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Round 1 Answer</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		
	</style>
</head>
<body>
	<div>
		<table class="table table-striped table-hover">
			<thead style="background-color: #000; color: #fff;">
				<tr>
					<th>Sl No.</th>
					<th>Regd No.</th>
					<th>Question</th>
					<th>Answer</th>
					<th>Time</th>
					<th>Marks</th>
					<th>Update</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `round_2_answer`";
					$query_result = mysqli_query($con, $query);
					$count = 0;
					while($row = mysqli_fetch_assoc($query_result)) {
						$count++;
						echo '<tr>';
							echo '<td>'.$count.'</td>';
							echo '<td>'.$row["Regd"].'</td>';
							$queryQ = "SELECT `Question` FROM `round_2_question` WHERE `R2_id` = '".$row['Q_id']."'";
							$queryQ_result = mysqli_query($con, $queryQ);
							$rowQ = mysqli_fetch_assoc($queryQ_result);
							echo '<td>'.$rowQ["Question"].'</td>';
							echo '<td>'.$row['Answer'].'</td>';
							echo '<td>'.$row['Time'].'</td>';							
							echo '<form action="round_2_answer_view.php" method="POST">';
							echo '<input type="hidden" name="Regd" value="'.$row["Regd"].'" />';
							$queryS = "SELECT `Round_2` FROM `scoreboard` WHERE `Regd` = '".$row['Regd']."'";
							$queryS_result = mysqli_query($con, $queryS);
							$rowS = mysqli_fetch_assoc($queryS_result);
							echo '<td><input type="text" name="marks" value="'.$rowS["Round_2"].'" /></td>';
							echo '<td><button type="submit" class="btn btn-warning">Update</button></td>';
							echo '</form>';
							echo '<form action="round_2_answer_view.php" method="POST">';
							echo '<input type="hidden" name="Regd_delete" value="'.$row["Regd"].'" />';
							echo '<td><button type="submit" class="btn btn-danger">Delete</button></td>';
							echo '</form>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>