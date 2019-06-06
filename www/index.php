<html>
<head>
    <meta charset="utf-8">


</head>
<body>
<div class="container">

	<?php

	/**
	 * just for testing the connection
	 **/
	$conn = mysqli_connect('db', 'test', 'test', "test");


	$query = 'SHOW TABLES';
	$result = mysqli_query($conn, $query);

	while($value = $result->fetch_array(MYSQLI_ASSOC)) {
		foreach ( $value as $element ) {
			?><p><?php echo $element ?></p><?php
		}
	}
	$result->close();

	mysqli_close($conn);

	?>
</div>
</body>
</html>
