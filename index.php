<!DOCTYPE html>
<html>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<meta lang="en">
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>

		<link rel="apple-touch-icon" sizes="57x57" href="image/fav/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="image/fav/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="image/fav/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="image/fav/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="image/fav/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="image/fav/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="image/fav/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="image/fav/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="image/fav/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="image/fav/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="image/fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="image/fav/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="image/fav/favicon-16x16.png">
		<link rel="manifest" href="image/fav/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="image/fav/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<title>Cavalee | Restaurant Management System</title>
		<style>
			@font-face {
				font-family: 'Product Sans';
				font-style: normal;
				font-weight: 400;
				src: local('Open Sans'), local('OpenSans'), url(https://fonts.gstatic.com/s/productsans/v5/HYvgU2fE2nRJvZ5JFAumwegdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
				}

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
				margin-top: 3%;
				float: left;
				text-align: center;
				border-radius: 15px;
				background-color: #fff;
			}

			#pos{
				margin-left: 20%;
			}

			#mang{
				margin-left: 4.5%;
				margin-right: 4.5%;
			}

			#ad{
				margin-right: 20%;
			}
			
			a{
				color: #000;
				font-size:22px;
				font-family: Product Sans;
				font-weight: 900;
				letter-spacing: 5px;
				mix-blend-mode: screen;
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
				text-align: center;
				font-size: 48px;
				letter-spacing: 4px;
				font-family: Product Sans;
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
				width: 20%;
				height: auto;
				padding-left: 40%;
				padding-right: 40%;
				margin: 0;
				margin-top: 3%;
			}

			.footernote {
				display: block;
				width: 100%;
				position: fixed;
				top: 640px;
				text-align: center;
			}

			p{
				color: #fff;
				font-size: 14px;
			}

			@media only screen and (max-width: 1430px) {
				a {
					font-size: 15px;
				}
			}

			@media only screen and (max-width: 1130px) {
				a {
					font-size: 12px;
				}
			}

		</style>				
	</head>
	<body>
		<div class="bgimg">
			<img src="image/IndBack.png">
		</div>
		
		<div class="content">
			<br>
			<img src="image/Logo-White.png" class="logo">
			<h1>Restaurant Management System</h1>
			<a id="pos" href="pos">POS Portal</a>
			<a id="mang" class="cstmls" href="manager">Manager Portal</a>
			<a id="ad" href="admin">Admin Portal</a>
		</div>

		<footer>
			<div class="footernote">
				<p>PixelCore IT Solutions (Pvt.) Ltd. - +94 76 791 2651 / + 94 71 588 6675</p>
			</div>
		</footer>
	</body>
</html>