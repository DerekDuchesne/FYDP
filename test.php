<?php
	$issue = $_GET['issue'];
?>

<!doctype html>
<html lang="en-us">
	<head>
		<title>FYDP</title>
    		<link rel="shortcut icon" href="img/shortcut.ico">
    		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
    		<link rel="stylesheet" href="css/styles.css">	
	</head>
	<body style="color:white;" onload="update_page('<?php echo htmlspecialchars($issue) ?>')">
		<h4>Testing Git Hooks 11...</h4>
		<h3>CEL List</h3>
		<form>
			<div id="cel_list"></div>
		</form>
		<br>
		<br>
                <h3>Trenton News RSS Feed</h3>
		<div id="policy_options_rss"></div>
                <h3>Problem Statement</h3>
		<div id="problem_statement"></div>
		<h3>Featured Bills:</h3>
		<div id="bill"></div>
                <script language='javascript' src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src ="bootstrap/js/bootstrap.js"></script>
		<script src="scripts/scripts.js"></script>
	</body>
</html>
