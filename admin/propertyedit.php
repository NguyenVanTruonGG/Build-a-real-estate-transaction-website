<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	$pid=$_REQUEST['id'];
	
	$title=$_POST['title'];
	$pcontent=$_POST['pcontent'];
	$type=$_POST['type'];
	$liv=$_POST['liv'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$wc=$_POST['wc'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$dis=$_POST['dis']; 
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_SESSION['uid'];
	$feature=$_POST['feature'];
	
	$isFeatured=$_POST['isFeatured'];
	
	// $aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	$aimage5=$_FILES['aimage5']['name'];
	$aimage6=$_FILES['aimage6']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];

	// $isFeatured=$_POST['isFeatured'];
	
	// $temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	$temp_name5 =$_FILES['aimage5']['tmp_name'];
	$temp_name6 =$_FILES['aimage6']['tmp_name'];
	
	$temp_name7 =$_FILES['fimage']['tmp_name'];
	$temp_name8 =$_FILES['fimage1']['tmp_name'];
	$temp_name9 =$_FILES['fimage2']['tmp_name'];
	
	// move_uploaded_file($temp_name,"property/$aimage");
	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	move_uploaded_file($temp_name4,"property/$aimage4");
	move_uploaded_file($temp_name5,"property/$aimage5");
	move_uploaded_file($temp_name6,"property/$aimage6");
	
	move_uploaded_file($temp_name7,"property/$fimage");
	move_uploaded_file($temp_name8,"property/$fimage1");
	move_uploaded_file($temp_name9,"property/$fimage2");
	
	
	
	$sql = "UPDATE property SET title= '{$title}', pcontent= '{$pcontent}', type='{$type}', liv='{$liv}', stype='{$stype}',
	bedroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', wc='{$wc}', 
	size='{$asize}', price='{$price}', location='{$loc}', dis='{$dis}', city='{$city}', state='{$state}', feature='{$feature}',
	pimage1='{$aimage1}', pimage2='{$aimage2}', pimage3='{$aimage3}', pimage4='{$aimage4}', pimage5='{$aimage5}', pimage6='{$aimage6}',
	uid='{$uid}', status='{$status}', mapimage='{$fimage}', topmapimage='{$fimage1}', groundmapimage='{$fimage2}', 
    isFeatured='{$isFeatured}' WHERE pid = {$pid}";
	
	$result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Chỉnh sửa tin đăng thành công!</p>";
		header("Location:propertyview.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Chỉnh sửa tin đăng thất bại!</p>";
		header("Location:propertyview.php?msg=$msg");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>ADMIN-REALESTATE</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		
			<!-- Header -->
			<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Chỉnh sửa tin đăng</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Bảng điều khiển</a></li>
									<li class="breadcrumb-item active">Chỉnh sửa tin đăng</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Chỉnh sửa tin đăng</h4>
									<?php echo $error; ?>
									<?php echo $msg; ?>
								</div>
								<form method="post" enctype="multipart/form-data">
								
								<?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from property where pid='$pid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="card-body">
									<h5 class="card-title">Chi tiết chỉnh sửa tin đăng</h5>
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Tiêu đề</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required value="<?php echo $row['1']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Mô tả</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="pcontent" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Loại hình</label>
													<div class="col-lg-9">
														<select class="form-control" required name="type">
														<option value="">Chọn loại hình</option>
															<option value="Căn hộ">Căn hộ</option>
                                                            <option value="Nhà ở">Nhà ở</option>
												            <option value="Mặt bằng">Mặt bằng</option>
												            <option value="Đất nền">Đất nền</option>							
												            <option value="Văn phòng">Văn phòng</option>
                                                    
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình thức</label>
													<div class="col-lg-9">
														<select class="form-control" required name="stype">
														<option value="">Chọn hình thức</option>
															<option value="Thuê">Thuê</option>
															<option value="Bán">Bán</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Phòng khách</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="liv" required value="<?php echo $row['4']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Phòng bếp</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required value="<?php echo $row['9']; ?>">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">Phòng tắm</label>
													<div class="col-lg-9">
													<input type="text" class="form-control" name="bath" required value="<?php echo $row['7']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Phòng ngủ</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed" required value="<?php echo $row['6']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ban công</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required value="<?php echo $row['8']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Nhà vệ sinh</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="wc" required value="<?php echo $row['10']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										<h4 class="card-title">Giá và vị trí</h4>
									<div class="row">
										<div class="col-xl-6">
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Giá</label>
												<div class="col-lg-9">

													<input type="text" class="form-control" name="price" required value="<?php echo $row['12']; ?>">
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Tỉnh/ Thành phố</label>
												<div class="col-lg-9">
													<input type="text" name="state" id="state_name" value="<?php echo $row['16']; ?>" hidden>
													<select class="form-control" id="state">
														<option value=""><?php echo $row['16']; ?></option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Quận/ Huyện</label>
												<div class="col-lg-9">
													<input type="text" name="city" id="city_name" value="<?php echo $row['15']; ?>" hidden>
													<select class="form-control" id="city">
														<option value=""><?php echo $row['15']; ?></option>
													</select>
												</div>
											</div>

										</div>
										<div class="col-xl-6">
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Diện tích</label>
												<div class="col-lg-9">

													<input type="text" class="form-control" name="asize" required value="<?php echo $row['11']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Địa chỉ</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="loc" required value="<?php echo $row['13']; ?>">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Giảm giá</label>
												<div class="col-lg-9">
												
													<select class="form-control" required name="dis">
														<option value="">Chọn thuộc tính</option>
														<option value="Thương lượng">Thương lượng</option>
														<option value="Không">Không</option>

													</select>
												</div>
											</div>

										</div>
									</div>
										
										<h4 class="card-title">Hình ảnh và trạng thái</h4>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
														<img src="property/<?php echo $row['18'];?>" alt="pimage1" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
														<img src="property/<?php echo $row['20'];?>" alt="pimage3" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 5</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage5" type="file" required="">
														<img src="property/<?php echo $row['22'];?>" alt="pimage5" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Sơ đồ 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file" required="">
														<img src="property/<?php echo $row['26'];?>" alt="mapimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Sơ đồ 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file" required="">
														<img src="property/<?php echo $row['27'];?>" alt="topmapimage" height="150" width="180">
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
														<img src="property/<?php echo $row['19'];?>" alt="pimage2" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
														<img src="property/<?php echo $row['21'];?>" alt="pimage4" height="150" width="180">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 6</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage6" type="file">
														<img src="property/<?php echo $row['23'];?>" alt="pimage6" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Sơ đồ 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
														<img src="property/<?php echo $row['28'];?>" alt="groundmapimage" height="150" width="180">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Trạng thái</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Chọn trạng thái</option>
															<option value="Chưa giao dịch">Chưa giao dịch</option>
															<option value="Chưa giao dịch">Đã giao dịch</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										<hr>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label"><b>Tin nổi bật?</b></label>
													<div class="col-lg-9">
														<select class="form-control"  required name="isFeatured">
															<option value="">Chọn thuộc tính</option>
															<option value="1">Yes</option>
															<option value="0">No</option>
															
														</select>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Uid</label>
													<div class="col-lg-9">
													<input type="text" class="form-control" name="uid" required value="<?php echo $row['24']; ?>">
													</div>
												</div>
											</div>
										</div>

										
										<input type="submit" value="Cập nhật" class="btn btn-success col-lg-4" name="add" style="margin-left: 165px; border-radius: 10px;">
										
									</div>
								</form>
								
								<?php
									} 
								?>
												
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>