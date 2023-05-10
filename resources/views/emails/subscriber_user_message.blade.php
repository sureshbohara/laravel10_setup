<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Email Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			color: #333;
			background-color: #f5f5f5;
			margin: 0;
			padding: 0;
		}

		.container {
			max-width: 600px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 20px;
			box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
		}

		.header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 20px;
		}

		.logo {
			max-width: 100px;
		}

		.links {
			display: flex;
			align-items: center;
		}

		.links a {
			color: #333;
			margin-left: 20px;
			text-decoration: none;
		}

		.title {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
		}

		.message {
			margin-bottom: 20px;
		}

		.footer {
			background-color: #f5f5f5;
			padding: 20px;
			text-align: center;
		}

		.contact-info {
			font-size: 14px;
			color: #777;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<img class="logo" src="https://via.placeholder.com/150x50.png" alt="Logo">
			<div class="links">
				<a href="#">Link 1</a>
				<a href="#">Link 2</a>
				<a href="#">Link 3</a>
			</div>
		</div>
		<div class="body">
			<div class="title">{{$name}}</div>
			<div class="message">
				<p>{{$body}}</p>
			</div>
		</div>
		<div class="footer">
			<div class="contact-info">
				<p>123 Main Street</p>
				<p>Anytown, USA 12345</p>
				<p>Phone: (123) 456-7890</p>
				<p>Email: info@example.com</p>
			</div>
		</div>
	</div>
</body>
</html>
