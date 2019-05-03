<html>
	<head>
		<meta charset="UTF-8">
		<title>login NVI</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="js/prefixfree.min.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/index.js"></script>
	</head>
	<body>
		<div id="logo"> 
			<h1><i> Localhost.Fail</i></h1>
		</div> 
		<section class="stark-login">
			<form action="./pages/secu/validation.php" method="POST">	
				<div id="fade-box">
					<input type="text" name="login" id="username" placeholder="Username" required>
					<input type="password" name="pass" placeholder="Password" required>
					<input type="hidden" name="memo" value="yes" checked>
					<button>Log In</button>
				</div>
			</form>
				<div class="hexagons">
					<img src="./images/background/background.jpg" height="768px" width="1366px"/> 
				</div>      
		</section> 
	</body>
</html>
