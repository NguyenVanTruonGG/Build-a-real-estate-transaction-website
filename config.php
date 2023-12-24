<?php

$con = mysqli_connect("localhost","root","","realestatephp");
	if (mysqli_connect_errno())
	{
		echo "Kết nối MySQL thất bại!: " . mysqli_connect_error();
	}
?>