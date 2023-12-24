<?php
include("config.php");
$pid = $_GET['id'];
$sql = "DELETE FROM property WHERE pid = {$pid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Xóa tin thành công!</p>";
	header("Location:propertyview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Xóa tin thất bại!</p>";
	header("Location:propertyview.php?msg=$msg");
}
mysqli_close($con);
?>