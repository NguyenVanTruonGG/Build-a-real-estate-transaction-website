<?php
include("config.php");
$cid = $_GET['id'];
$sql = "DELETE FROM contact WHERE cid = {$cid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Xóa liên hệ thành công!</p>";
	header("Location:contactview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Xóa liên hệ thất bại!</p>";
	header("Location:contactview.php?msg=$msg");
}
mysqli_close($con);
?>
