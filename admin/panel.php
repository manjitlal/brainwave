<?php
	session_start();
	if(!isset($_SESSION['mode'])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
	<link rel="stylesheet" type="text/css" href="css/panel.css" />
	<script type="text/javascript">
		function changePage(page) {
			document.getElementById("frame").setAttribute("src", page);
		}
		function navigate(page) {
			window.location.href = page;
		}
	</script>
</head>
<body>
	<div class="container-fluid height">
		<div class="row height">
			<div class="col-md-2" style="background-color: seagreen; min-height: 100%">
				<div id="sidebar-content">
					<div class="text-center" id="head">
						Welcome Admin
					</div>
					<div>			
						<button type="button" onclick="changePage('user_details.php');">User Details</button>
					</div>
					<div>
						<button type="button" onclick="changePage('leaderboard.php');">Leaderboard</button>
					</div>
					<div>			
						<button type="button" onclick="changePage('round_1_question.php');">Round 1 Question</button>
					</div>
					<div>
						<button type="button" onclick="changePage('round_2_question.php');">Round 2 Question</button>
					</div>
					<div>			
						<button type="button" onclick="changePage('round_1_answer_view.php');">Round 1 Answers</button>
					</div>
					<div>
						<button type="button" onclick="changePage('round_2_answer_view.php');">Round 2 Answers</button>
					</div>
					<div>
						<button type="button" onclick="changePage('passkey.php');">Update Passkey</button>
					</div>
					<div>			
						<button type="button" onclick="changePage('feedback_view.php');">View Feedback</button>
					</div>
					<div>			
						<button type="button" onclick="navigate('signout.php');">Logout</button>
					</div>
				</div>
			</div>
			<div class="col-md-10 height">
				<iframe src="user_details.php" width="100%" id="frame"></iframe>
			</div>
		</div>	
	</div>
</body>
</html>