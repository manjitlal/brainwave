<?php
	require 'database/db_connection.php';
	$num_rows=0;
	try{
		$query="select s.regd,u.name,s.round_1,s.round_2,s.round_3,s.total from scoreboard s, user_details u where s.regd=u.regd order by s.total desc ";
		$result=mysqli_query($con,$query);
		$num_rows=mysqli_num_rows($result);
	}
	catch(Exception $ex){
		echo "Error :- ".$ex->getMessage();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LeatherBoard-Plcub</title>
	<link rel="shortcut icon" href="img/boy4.png" type="image/png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/disabled.js"></script>
	<script src="js/localhost.js"></script>
</head>
<body>
<?php include 'header.php';?>

<div class="container">
	<h1 class="text-center font-custom">Score Details  <hr class="custom-hr" width="250"></h1>

	<?php
		if($num_rows>0){
			?>
				<table class="table table-condensed well boxshadow font-custom">
					<thead style="background-color: #000; color:#fff;">
						<th>S.NO</th>
						<th>Regd No.</th>
						<th>Name</th>
						<th>Round 1</th>
						<th>Round 2</th>
						<th>Round 3</th>
						<th>Total</th>
					</thead>
					<tbody>
						<?php
						$count=0;
						while ($row=mysqli_fetch_assoc($result)){
							$count++;
							echo "<tr>";
							echo "<td>".$count."</td>";
							echo "<td>".$row['regd']."</td>";
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['round_1']."</td>";
							echo "<td>".$row['round_2']."</td>";
							echo "<td>".$row['round_3']."</td>";
							echo "<td>".$row['total']."</td>";
							echo "</tr>";
						}

						?>
					</tbody>
				</table>
			<?php
		}
		else
			echo "<h3 class='text-center font-custom'>No one has appeared for the events yet</h3>";

	mysqli_close($con);
	?>

</div>

</body>
</html>