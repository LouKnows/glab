<?php
	$to = $_GET['to'];
	$token = $_GET['token'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reply Form</title>
</head>
<body>
	<div>
		<form action="send_reply.php" method="POST">
			<p>To: <?php echo $to; ?></p>
			<input type="hidden" name="address" value="<?php echo $to; ?>" >
			<input type="hidden" name="access_token" value="<?php echo $token; ?>" >
			<p>Message:</p>
			<p>
				<textarea name='outbound-msg'>		
				</textarea>
			</p>
			<p>
				<input type="submit" value="Send Reply">
			</p>
		</form>
	</div>
</body>
</html>