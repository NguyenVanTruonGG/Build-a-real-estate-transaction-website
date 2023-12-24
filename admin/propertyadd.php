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
	
	$sql="INSERT INTO property (title, pcontent, type, liv, stype, bedroom, bathroom, balcony, kitchen, wc, size, price, location, dis, city, state, feature, pimage1, pimage2, pimage3, pimage4, pimage5, pimage6, uid, status, mapimage, topmapimage, groundmapimage, isFeatured)
	VALUES('$title','$pcontent','$type','$liv','$stype','$bed','$bath','$balc','$kitc','$wc','$asize','$price',
	'$loc', '$dis', '$city','$state','$feature','$aimage1','$aimage2','$aimage3','$aimage4','$aimage5','$aimage6','$uid','$status','$fimage','$fimage1','$fimage2', '$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Bất động sản đã được thêm thành công!</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Đã xảy ra lỗi. Vui lòng thử lại!</p>";
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
								<h3 class="page-title">Thêm bất động sản</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Bảng điều khiển</a></li>
									<li class="breadcrumb-item active">Thêm bất động sản</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Chi tiết thêm bất động sản</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
									<h5 class="card-title">Chi tiết bất động sản</h5>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Tiêu đề</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Vui lòng nhập tiêu đề!">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Nội dung</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="pcontent" rows="10" cols="30"></textarea>
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
                                                            <option value="Villa">Villa</option>
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
														<!-- <input type="text" class="form-control" name="bath" required placeholder=""> -->
														<select class="form-control" required name="liv">
														<option value="">Chọn số lượng</option>
														    <option value="0 liv">0 phòng</option>
															<option value="1 liv">1 phòng</option>
															<option value="2 liv">2 phòng</option>
															<option value="3 liv">3 phòng</option>
															<option value="4 liv">4 phòng</option>
															<option value="5 liv">5 phòng</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Phòng bếp</label>
													<div class="col-lg-9">
														<!-- <input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)"> -->
														<select class="form-control" required name="kitc">
															<option value="">Chọn số lượng</option>
															<option value="0 kitc">0 phòng</option>
															<option value="1 kitc">1 phòng</option>
															<option value="2 kitc">2 phòng</option>
															<option value="3 kitc">3 phòng</option>
															<option value="4 kitc">4 phòng</option>
															<option value="5 kitc">5 phòng</option>
															<option value="6 kitc">6 phòng</option>
															<option value="7 kitc">7 phòng</option>
															<option value="8 kitc">8 phòng</option>
															<option value="9 kitc">9 phòng</option>
															<option value="10 bath">10 phòng</option>
														</select>
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">Phòng tắm</label>
													<div class="col-lg-9">
													<select class="form-control" required name="bath">
													<option value="">Chọn số lượng</option>
													        <option value="0 bath">0 phòng</option>
															<option value="1 bath">1 phòng</option>
															<option value="2 bath">2 phòng</option>
															<option value="3 bath">3 phòng</option>
															<option value="4 bath">4 phòng</option>
															<option value="5 bath">5 phòng</option>
															<option value="6 bath">6 phòng</option>
															<option value="7 bath">7 phòng</option>
															<option value="8 bath">8 phòng</option>
															<option value="9 bath">9 phòng</option>
															<option value="10 bath">10 phòng</option>
													</select>		
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Phòng ngủ</label>
													<div class="col-lg-9">
														<!-- <input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 10)"> -->
														<select class="form-control" required name="bed">
															<option value="">Chọn số lượng</option>
															<option value="0 bed">0 phòng</option>
															<option value="1 bed">1 phòng</option>
															<option value="2 bed">2 phòng</option>
															<option value="3 bed">3 phòng</option>
															<option value="4 bed">4 phòng</option>
															<option value="5 bed">5 phòng</option>
															<option value="6 bed">6 phòng</option>
															<option value="7 bed">7 phòng</option>
															<option value="8 bed">8 phòng</option>
															<option value="9 bed">9 phòng</option>
															<option value="10 bed">10 phòng</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ban công</label>
													<div class="col-lg-9">
														<!-- <input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)"> -->
														<select class="form-control" required name="balc">
															<option value="">Chọn số lượng</option>
															<option value="0 balc">0</option>
															<option value="1 balc">1</option>
															<option value="2 balc">2</option>
															<option value="3 balc">3</option>
															<option value="4 balc">4</option>
															<option value="5 balc">5</option>
															<option value="6 balc">6</option>
															<option value="7 balc">7</option>
															<option value="8 balc">8</option>
															<option value="9 balc">9</option>
															<option value="10 balc">10</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Nhà vệ sinh</label>
													<div class="col-lg-9">
														<!-- <input type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 10)"> -->
														<select class="form-control" required name="wc">
															<option value="">Chọn số lượng</option>
															<option value="0 wc">0 phòng</option>
															<option value="1 wc">1 phòng</option>
															<option value="2 wc">2 phòng</option>
															<option value="3 wc">3 phòng</option>
															<option value="4 wc">4 phòng</option>
															<option value="5 wc">5 phòng</option>
															<option value="6 wc">6 phòng</option>
															<option value="7 wc">7 phòng</option>
															<option value="8 wc">8 phòng</option>
															<option value="9 wc">9 phòng</option>
															<option value="10 wc">10 phòng</option>
														</select>
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
														<input type="text" class="form-control" name="price" required placeholder="Vui lòng nhập thông tin!">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Khu vực</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required placeholder="Vui lòng nhập thông tin!">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Thành phố</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Vui lòng nhập thông tin!">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Diện tích</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="Vui lòng nhập thông tin!">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Địa chỉ</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Vui lòng nhập thông tin!">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Giảm giá</label>
													<div class="col-lg-9">
														<!-- <input type="text" class="form-control" name="loc" required placeholder="Vui lòng điền đầy đủ thông tin!"> -->
														<select class="form-control" required name="dis">
															<option value="">Chọn thuộc tính</option>
															<option value="Thương lượng">Thương lượng</option>
															<option value="Không">Không</option>
					
														</select>
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Chi tiết</label>
											<div class="col-lg-9">
											<!-- <p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p> -->
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												
											</textarea>
											</div>
										</div>
												
										<h4 class="card-title">Hình ảnh và trạng thái</h4>
										<div class="row">
											<div class="col-xl-6">
												
											<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 1 </label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 5</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage5" type="file" required="">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">SĐ phác thảo</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Tầng hầm</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>

											
											</div>
											<div class="col-xl-6">
												
											<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hình ảnh 6</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage6" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Tầng trệt</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Trạng thái</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Chọn trạng thái</option>
															<option value="Có sẵn">Có sẵn</option>
															<option value="Hết">Hết</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										<hr>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label"><b>BĐS nổi bật?</b></label>
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
														<input type="text" class="form-control" name="uid" required placeholder="Vui lòng nhập thông tin!">
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="Submit" class="btn btn-success"name="add" style="margin-left:200px; border-radius: 15px;">
										
								</div>
								</form>
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