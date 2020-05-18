<?php
	$conn = mysqli_connect('localhost', 'sehmimul', 'test1234', 'cookbook');
	if (!$conn) {
		echo "Not connected!". mysqli_connect_error();
	}
	?>