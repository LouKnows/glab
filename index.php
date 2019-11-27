<?php

	require('get_messages.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>GlobeLab Sample</title>
	<style type="text/css">
		.body{
			background-color: #f2f2f2;
		}
		.container{
			width: 80%;
			height: 100vh;
			margin: auto;
			position: relative;
			color: #404040;
			font-family: sans-serif;
		}

		.messages{
			width: 300px;
		}

		ul{
			list-style-type: none;
		}

		li{
			padding: 10px;
			border-bottom: 1px solid #cccccc;
		}

		span{
			background-color: #d9edf7;
			border-color: #bce8f1;
			color: #31708f;
			margin-right: 30px;
			border-radius: 5px;
			padding: 5px;
		}
		a{
			color: inherit;
			text-decoration: none;
		}
		span:hover{
			background-color: #d1f0ff;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="messages">
			<h4>Messages:</h4>
			<ul>
				<?php
					foreach ($messages as $msg) {
						$to = $msg['sender'];
						$token = $msg['access_token'];
						echo '<li>';
						echo $msg['text_msg'];
						echo "<span><a href='reply_form.php?to=$to&token=$token'>Reply</a></span>";
						echo '</li>';
					}
				?>
			</ul>
		</div>
	</div>
</body>
</html>