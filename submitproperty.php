<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
	header("location:login.php");
}

//// code insert
//// add code
$error = "";
$msg = "";
if (isset($_POST['add'])) {

	$title = $_POST['title'];
	$pcontent = $_POST['pcontent'];
	$type = $_POST['type'];
	$liv = $_POST['liv'];
	$bed = $_POST['bed'];
	$balc = $_POST['balc'];
	$wc = $_POST['wc'];
	$stype = $_POST['stype'];
	$bath = $_POST['bath'];
	$kitc = $_POST['kitc'];
	$price = $_POST['price'];
	$city = $_POST['city'];
	$asize = $_POST['asize'];
	$loc = $_POST['loc'];
	$dis = $_POST['dis'];
	$state = $_POST['state'];
	$status = $_POST['status'];
	$uid = $_SESSION['uid'];
	// $feature = $_POST['feature'];
	$isFeatured = $_POST['isFeatured'];
	// print_r($state);
	// print_r($city);

	// $aimage=$_FILES['aimage']['name'];
	$aimage1 = $_FILES['aimage1']['name'];
	$aimage2 = $_FILES['aimage2']['name'];
	$aimage3 = $_FILES['aimage3']['name'];
	$aimage4 = $_FILES['aimage4']['name'];
	$aimage5 = $_FILES['aimage5']['name'];
	$aimage6 = $_FILES['aimage6']['name'];

	$fimage = $_FILES['fimage']['name'];
	$fimage1 = $_FILES['fimage1']['name'];
	$fimage2 = $_FILES['fimage2']['name'];

	// $temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 = $_FILES['aimage1']['tmp_name'];
	$temp_name2 = $_FILES['aimage2']['tmp_name'];
	$temp_name3 = $_FILES['aimage3']['tmp_name'];
	$temp_name4 = $_FILES['aimage4']['tmp_name'];
	$temp_name5 = $_FILES['aimage5']['tmp_name'];
	$temp_name6 = $_FILES['aimage6']['tmp_name'];

	$temp_name7 = $_FILES['fimage']['tmp_name'];
	$temp_name8 = $_FILES['fimage1']['tmp_name'];
	$temp_name9 = $_FILES['fimage2']['tmp_name'];

	// move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1, "admin/property/$aimage1");
	move_uploaded_file($temp_name2, "admin/property/$aimage2");
	move_uploaded_file($temp_name3, "admin/property/$aimage3");
	move_uploaded_file($temp_name4, "admin/property/$aimage4");
	move_uploaded_file($temp_name5, "admin/property/$aimage5");
	move_uploaded_file($temp_name6, "admin/property/$aimage6");

	move_uploaded_file($temp_name7, "admin/property/$fimage");
	move_uploaded_file($temp_name8, "admin/property/$fimage1");
	move_uploaded_file($temp_name9, "admin/property/$fimage2");

	$sql = "insert into property (title, pcontent, type, liv, stype, bedroom, bathroom, balcony, kitchen, wc, size, price, location, dis, city, state, pimage1, pimage2, pimage3, pimage4, pimage5, pimage6, uid, status, mapimage, topmapimage, groundmapimage, isFeatured)
	values('$title','$pcontent','$type','$liv','$stype','$bed','$bath','$balc','$kitc','$wc','$asize','$price',
	'$loc', '$dis', '$city','$state','$aimage1','$aimage2','$aimage3','$aimage4','$aimage5','$aimage6','$uid','$status','$fimage','$fimage1','$fimage2', '$isFeatured')";
	$result = mysqli_query($con, $sql);
	if ($result) {
		$msg = "<p class='alert alert-success'>Đăng tin thành công!</p>";
	} else {
		$error = "<p class='alert alert-warning'>Đăng tin thất bại!</p>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta Tags -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="images/favicon.ico">

	<!--	Fonts
	========================================================-->
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

	<!--	Css Link
	========================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/layerslider.css">
	<link rel="stylesheet" type="text/css" href="css/color.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
	<!--	Title
	=========================================================-->
	<title>REAL-ESTATE</title>
</head>

<body>

	<div id="page-wrapper">
		<div class="row">
			<!--	Header start  -->
			<?php include("include/header.php"); ?>

			<!--	Submit property   -->
			<div class="full-row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Đăng tin bất động sản</h2>
						</div>
					</div>
					<div class="row p-5 bg-white">
						<form method="post" enctype="multipart/form-data">
							<div class="description">
								<h5 class="text-secondary">Thông tin</h5>
								<hr>
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
											<label class="col-lg-2 col-form-label">Mô tả</label>
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
												<!-- <input type="text" class="form-control" name="bath" required placeholder="Vui lòng nhập thông tin!"> -->
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
												<!-- <input type="text" class="form-control" name="kitc" required placeholder="Vui lòng nhập thông tin!"> -->
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
													<option value="10 kitc">10 phòng</option>
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
												<!-- <input type="text" class="form-control" name="bed" required placeholder="Vui lòng nhập thông tin!"> -->
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
												<!-- <input type="text" class="form-control" name="balc" required placeholder="Vui lòng nhập thông tin!"> -->
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
												<!-- <input type="text" class="form-control" name="hall" required placeholder="Vui lòng nhập thông tin!"> -->
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
								<h5 class="text-secondary">Giá và vị trí</h5>
								<hr>
								<div class="row">
									<div class="col-xl-6">
										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Giá</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="price" required placeholder="Vui lòng nhập thông tin!">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Tỉnh/Thành phố</label>
											<div class="col-lg-9">
												<input type="text" name="state" id="state_name" hidden>
												<select class="form-control" id="state" required>
													<option value="">Chọn tỉnh/thành phố</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Quận/ Huyện</label>
											<div class="col-lg-9">
												<input type="text" name="city" id="city_name" hidden>
												<select class="form-control" id="city" required>
													<option value="">Chọn quận/ huyện</option>
												</select>
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
												<!-- <input type="text" class="form-control" name="loc" required placeholder="Vui lòng nhập thông tin!"> -->
												<select class="form-control" required name="dis">
													<option value="">Chọn thuộc tính</option>
													<option value="Thương lượng">Thương lượng</option>
													<option value="Không">Không</option>

												</select>
											</div>
										</div>

									</div>
								</div>

								<!-- <div class="form-group row">
									<label class="col-lg-2 col-form-label">Chi tiết</label>
									<div class="col-lg-9"> -->
										<!-- <p class="alert alert-danger">* Lưu ý: Vui lòng thay đổi theo mẫu đã có sẵn! <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p> -->
<!-- 
										<textarea class="tinymce form-control" name="feature" rows="10" cols="30"> -->
												<!---feature area start--->
												<!-- <div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Property Age : </span>10 Years</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Swiming Pool : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Apartment</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Church/Temple  : </span>No</li>
														
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">3rd Party : </span>No</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Elevator : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>
														</ul>
													</div> -->
												<!---feature area end---->
											<!-- </textarea>
									</div>
								</div> -->

								<h5 class="text-secondary">Hình ảnh và trạng thái</h5>
								<hr>
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
											<label class="col-lg-3 col-form-label">Sơ đồ 1</label>
											<div class="col-lg-9">
												<input class="form-control" name="fimage" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Sơ đồ 3</label>
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
											<label class="col-lg-3 col-form-label">Sơ đồ 2</label>
											<div class="col-lg-9">
												<input class="form-control" name="fimage2" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Trạng thái</label>
											<div class="col-lg-9">
												<select class="form-control" required name="status">
													<option value="">Chọn trạng thái</option>
													<option value="Chưa giao dịch">Chưa giao dịch</option>
													<option value="Đã giao dịch">Đã giao dịch</option>
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
												<select class="form-control" required name="isFeatured">
													<option value="">Chọn thuộc tính</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
												</select>
											</div>
										</div>

									</div>

								</div>


								<input type="submit" value="Đăng tin" class="btn btn-success col-lg-4" name="add" style="margin-left: 155px; border-radius: 10px;">

							</div>
						</form>
					</div>
				</div>
			</div>
			<!--	Submit property   -->


			<!--	Footer   start-->
			<?php include("include/footer.php"); ?>
			<!--	Footer   start-->

			<!-- Scroll to top -->
			<a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
			<!-- End Scroll To top -->
		</div>
	</div>
	
	<!--	Js Link
============================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/tinymce/tinymce.min.js"></script>
	<script src="js/tinymce/init-tinymce.min.js"></script>
	<!--jQuery Layer Slider -->
	<script src="js/greensock.js"></script>
	<script src="js/layerslider.transitions.js"></script>
	<script src="js/layerslider.kreaturamedia.jquery.js"></script>
	<!--jQuery Layer Slider -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/tmpl.js"></script>
	<script src="js/jquery.dependClass-0.1.js"></script>
	<script src="js/draggable-0.1.js"></script>
	<script src="js/jquery.slider.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/custom.js"></script>
	<script>
		// biến toàn cục thành phố
		let prefectures = null;

		function fetchPrefectures() {
			if (prefectures === null) {
				fetch("https://mo-dev.ment.vn/api/v1/prefectures")
					.then(response => response.json())
					.then(data => {
						prefectures = data.prefectures.map(item => ({
							id: item.id,
							label: item.name,
						}));
					})
					.catch(error => {
						prefectures = [];
						console.error("Lỗi khi gọi API prefectures: " + error);
					});
			}
		}
		fetchPrefectures();
		$("#state").click(function() {
			if (!$("#state").val()) {
				const prefecturesElement = prefectures.map(state =>
					`	<option class="option-state" value="${state.id}">${state.label}</option>`);
				$("#state").append(prefecturesElement);
				$("#state").change(function() {
					const selectedText = $(this).find(":selected").text();
					$("#city").html(`<option value="">Chọn quận/ huyện</option>`);
					$('#state_name').val(selectedText)
					$('#city_name').val("")
					console.log("$  selectedText:", selectedText);
				});
			}

		});

		$("#city").click(function() {
			if (!$("#city").val()) {
				fetch(`https://mo-dev.ment.vn/api/v1/prefectures/${$("#state").val()}/cities`)
					.then(response => response.json())
					.then(data => {
						cities = data.cities.map(item => ({
							id: item.id,
							label: item.name,
						}));
						const cityElement = cities.map(city =>
							`	<option class="option-city" value="${city.id}">${city.label}</option>`);
						$("#city").append(cityElement);
					})
					.catch(error => {
						console.error("Lỗi khi gọi API cities: " + error);
					});
			}
		});


		$("#city").change(function() {
			if ($("#city").val()) {
				const selectedText = $(this).find(":selected").text();
				$('#city_name').val(selectedText)
				console.log("$  selectedText:", selectedText);
			}
		});
	</script>
</body>

</html>