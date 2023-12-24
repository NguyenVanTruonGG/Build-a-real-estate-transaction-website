<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

////// code
$error='';
$msg='';
if(isset($_POST['insert']))
{
	$name=$_POST['name'];
	// $phone=$_POST['phone'];
    $ftype=$_POST['ftype'];

	$content=$_POST['content'];
	
	$uid=$_SESSION['uid'];
	
	if(!empty($name) && !empty($ftype) && !empty($content))
	{
		
		$sql="INSERT INTO feedback (uid,ftype,fdescription,status) VALUES ('$uid','$ftype','$content','Chờ duyệt')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Đã gửi thành công!</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Gửi không thành công!</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Vui lòng điền đầy đủ thông tin!</p>";
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
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Profile</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Profile</h2>
                        </div>
					</div>
                <div class="dashboard-personal-info p-5 bg-white">
                    <form action="#" method="post">
                        <h4 class="text-secondary border-bottom-on-white pb-3 mb-4">Phản hồi và Báo cáo</h4>
						<?php echo $msg; ?><?php echo $error; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="user-id">Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Vui lòng nhập tên!">
                                </div>                
                                
                                <!-- <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="number" name="phone"  class="form-control" placeholder="Vui lòng nhập số điện thoại!" maxlength="10">
                                </div> -->

                                <div class="form-group">
                                <label for="type">Hình thức</label>
												<select class="form-control" name="ftype">
                                                <option value="">Chọn hình thức</option>
												<option value="Phản hồi">Phản hồi</option>
												<option value="Báo cáo vi phạm">Báo cáo vi phạm</option>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="about-me">Nội dung</label>
                                    <textarea class="form-control" name="content" rows="7" placeholder="Nội dung..."></textarea>
                                </div>
                                <input type="submit" class="btn btn-danger col-lg-12" style="border-radius:5px;" name="insert" value="Gửi">
                            </div>
							</form>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 col-md-12">
								<?php 
									$uid=$_SESSION['uid'];
									$query=mysqli_query($con,"SELECT * FROM `user` WHERE uid='$uid'");
									while($row=mysqli_fetch_array($query))
									{
								?>
                                <div class="user-info mt-md-50"> <img src="admin/user/<?php echo $row['7'];?>" alt="userimage">
                                    <div class="mb-4 mt-3">
                                        
                                    </div>
									
                                    <div class="font-18 text-left">
                                        <div class="mb-1"><b>Tên:</b> <?php echo $row['1'];?></div>
                                        <div class="mb-1"><b>Email:</b> <?php echo $row['2'];?></div>
                                        <div class="mb-1"><b>Điện thoại:</b> <?php echo $row['3'];?></div>
                                        <div class="mb-1"><b>Zalo:</b> <?php echo $row['4'];?></div>
										<div class="mb-1"><b>Vai trò:</b> <?php echo $row['6'];?></div>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    
                </div>            
            </div>
        </div>
	<!--	Submit property   -->
      
        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
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
</body>
</html>