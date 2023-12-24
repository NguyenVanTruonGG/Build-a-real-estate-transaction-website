<?php
include("config.php");
$cid = $_GET['id'];
$sql = "DELETE FROM city WHERE cid = {$cid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Thành phố đã được xóa thành công!</p>";
	header("Location:cityadd.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Thành phố không được xóa thành công!</p>";
	header("Location:cityadd.php?msg=$msg");
}
mysqli_close($con);
?>
