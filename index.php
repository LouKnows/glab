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
				echo '<li>' . $msg['text_msg'] . ' from ' . $msg['sender'] . '</li>';
			}
		?>
	</ul>
</body>
</html>