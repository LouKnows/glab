<?php
	$to = $_GET['to'];
	$token = $_GET['token'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reply Form</title>
	<style type="text/css">
		.container{
			height: 100vh;
			width: 100%;
			position: relative;
			background-color: #404040;
		}
		.form{
			border: 1px solid #cce6ff;
			padding: 30px;
			width: 200px;
			height: 150px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			color: #31708f;
			font-family: sans-serif;
			border-radius: 5px;
		}

		.btn{
			border: none;
			background-color: #d9edf7;
			color: #31708f;
			padding: 7px 15px;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="form">
			<form action="send_reply.php" method="POST">
				<p>To: +<?php echo $to; ?></p>
				<input type="hidden" name="address" value="<?php echo $to; ?>" >
				<input type="hidden" name="access_token" value="<?php echo $token; ?>" >
				<p>Message:</p>
				<p>
					<textarea name='outbound-msg'></textarea>
				</p>
				<p>
					<input class="btn" type="submit" value="Send Reply">
				</p>
			</form>
		</div>
	</div>
</body>
</html>