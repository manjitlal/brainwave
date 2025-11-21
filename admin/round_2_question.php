<?php
	session_start();
	include 'connect.php';
	if(!isset($_SESSION['mode'])) {
		header('Location: index.php');
	}

	if(isset($_POST['update']) && isset($_POST['questionUpdate'])) {
		$R2_id = htmlspecialchars($_POST['update']);
		$questionU = htmlspecialchars($_POST['questionUpdate']);
		$query_update = "UPDATE `round_2_question` SET `Question` = '".mysqli_real_escape_string($con, $questionU)."' WHERE `R2_id` = '".mysqli_real_escape_string($con, $R2_id)."'";
		if(!empty($questionU) && !empty($R2_id)) {
			if(mysqli_query($con, $query_update)) {
				// echo '<script type="text/javascript">
				// 	alert("Success");
				// </script>';
			} else {
				// echo '<script type="text/javascript">
				// 	alert("Failure");
				// </script>';
			}
		} else {
			// echo '<script type="text/javascript">
			// 		alert("Question cannot be blank.");
			// 	</script>';
		}
	}

	$query = "SELECT COUNT(*) AS QuestionNo FROM `round_2_question`";
	$query_result = mysqli_query($con, $query);
	while($row = mysqli_fetch_assoc($query_result)) {
		$questionNo = $row["QuestionNo"];
	}

	if(isset($_POST['question'])) {
		$question = htmlspecialchars($_POST['question']);
		if(!empty($question)) {
			$query = "INSERT INTO `round_2_question` VALUES ('', '".mysql_real_escape_string($question)."')";
			if($query_result = mysqli_query($con, $query)) {
				header('Location: round_2_question.php');
			} else {
				echo '<script type="text/javascript">
					alert("Question submission failed.");
				</script>';
			}
		} else {
			echo '<script type="text/javascript">
					alert("Question field cannot be empty.");
				</script>';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Round 1 Question</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		textarea {
			resize: none;
		}
	</style>
</head>
<body>
	<div>
		<h1 class="text-primary text-center">Jumbled Code</h1>
		<h2 class="text-primary text-center">Enter Question No.<?php if(isset($questionNo)) echo $questionNo+1; ?></h2>
		<form action="round_2_question.php" method="POST">
			<textarea rows="10" cols="100" name="question" class="form-control"></textarea>
			<br />
			<button type="submit" class="btn btn-success form-control">Submit</button>
		</form>
	</div>
	<br />
	<div>
		<table class="table table-striped table-hover">
			<thead style="background-color: #000; color: #fff;">
				<th>Sl No.</th>
				<th>Question</th>
				<th>Update</th>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `round_2_question` WHERE 1";
					$query_result = mysqli_query($con, $query);
					$count = 0;
					while($row = mysqli_fetch_assoc($query_result)) {
						$count++;
						echo '<tr>';
							echo '<td>'.$count.'</td>';
							echo '<form action="round_2_question.php" method="POST">';
							echo '<td><textarea rows="5" cols="100" name="questionUpdate">'.$row['Question'].'</textarea></td>';
							echo '<input type="hidden" name="update" value="'.$row["R2_id"].'" />';
							echo '<td><button type="submit" class="btn btn-warning">Update</button></td>';
							echo '</form>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>