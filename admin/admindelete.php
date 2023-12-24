<?php
include("config.php");
$aid = $_GET['id'];
$sql = "DELETE FROM admin WHERE aid = {$aid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Xóa admin thành công!</p>";
	header("Location:adminlist.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Xóa admin thất bại!</p>";
	header("Location:adminlist.php?msg=$msg");
}
mysqli_close($con);
?>
