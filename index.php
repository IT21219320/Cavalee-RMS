<!DOCTYPE html>
<html>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta lang="en">
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Cavalee | Restaurant Management System</title>
		<style>
			body{
				top: 0;
				left: 0;
				margin: 0;
				padding: 0;
			}

			.bgimage{
				width: 100%;
				height: 100%;
			}

			a {
				display: inline;
				width: 15%;
				height: 5%;
				padding: 1%;
				margin-top: 5%;
				margin-left: 23%;
				margin-right: 0.1%;
				float: left;
				text-align: center;
				background-color: white;
				border-radius: 15px;
				opacity: 0.85;
				background: linear-gradient(to right,#f4a417 ,#ff3d2d);
				background-color: #f4a417;
			}
			
			a{
				color:white;
				font-size:25px;
			}

			a:link {
				text-decoration: none;
			}

			a:hover {
				transform: scale(1.05);
				transition: 0.4s;
			}

			h1{
				color: white;
				margin: 0;
				padding: 0;
			}

			.bgimg img{
				width: 100%;
				height: 100%;
				position:fixed;
				margin: 0;
				padding: 0;
				z-index: -1;
			}

			.logo{
				width: 28%;
				height: auto;
				padding-left: 36%;
				padding-right: 36%;
				padding-top: 150px;
				margin: 0;
			}
		</style>				
	</head>
	<body>
		<div class="bgimg">
			<img src="image/back1.jpg">
		</div>
		
		<div class="content">
			<br>
			<img src="image/Cavalee-1.png" class="logo">
			<h1 style="text-align:center;">Restaurant Management System</h1>
			<a href="staff">Staff Portal</a>
			<a href="admin">Admin Portal</a>
		</div>
	</body>
</html>