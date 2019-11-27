<?php

	require('get_messages.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>GlobeLab Sample</title>
</head>
<body>
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
</body>
</html>