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
			display: inline-block;
			margin-left: 10px;
			margin-right: 10px;
		}

		span.delete{
			color: #a94442;
		    background-color: #f2dede;
		    border-color: #ebccd1;
		    border-radius: 5px;
			padding: 5px;
		}

		span.reply{
			background-color: #d9edf7;
			border-color: #bce8f1;
			color: #31708f;
			border-radius: 5px;
			padding: 5px;
		}

		a{
			color: inherit;
			text-decoration: none;
		}
		span.reply:hover{
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
						$id = $msg['id'];
						echo '<li>';
						echo '<span>' . $msg['text_msg'] . '</span>';
						echo "<span class='reply'><a href='reply_form.php?to=$to&token=$token'>Reply</a></span>";
						echo "<span class='delete'><a href='delete_message.php?id=$id'>Delete</a></span>";
						echo '</li>';
					}
				?>
			</ul>
		</div>
	</div>
</body>
</html>