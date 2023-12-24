<?php
include("config.php");
$pid = $_GET['id'];
$sql = "DELETE FROM property WHERE pid = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Xóa tin đăng thành công!</p>";
	header("Location:feature.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Xóa tin đăng thất bại!</p>";
	header("Location:feature.php?msg=$msg");
}
mysqli_close($con);
?>