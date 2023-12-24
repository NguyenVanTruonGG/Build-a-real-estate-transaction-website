<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   
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
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .cursor-poiter {
            cursor: pointer;
        }

        #modalContent .slider-horizontal {
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
        }

        #modalContent .slider-selection {
            background: #28a745;
        }

        #modalContent .slider.slider-horizontal .slider-track {
            height: 5px;
            margin-top: -2px;
        }

        #modalContent .slider-handle {
            background-color: #28a745;
            background-image: -moz-linear-gradient(top, #28a745, #28a745);
            background-image: -webkit-gradient(linear,
                    0 0,
                    0 100%,
                    from(#28a745),
                    to(#28a745));
            background-image: -webkit-linear-gradient(top, #28a745, #28a745);
            background-image: -o-linear-gradient(top, #28a745, #28a745);
            background-image: linear-gradient(to bottom, #28a745, #28a745);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#28a745', endColorstr='#28a745', GradientType=0);
            background-color: #28a745;
        }

        .stars {
            color: rgb(218, 165, 32);
        }
        
    </style>
    <!--	Title
	=========================================================-->
    <title>REAL-ESTATE</title>
</head>

<body>


    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php"); ?>
            <!--	Header end  -->

            <!--	Banner Start   -->
            <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('images/banner/rshmpg.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-4"><span class="text-success">LET US</span><br>
                                    SERVE YOU</h1>
                                <form method="post" action="propertygrid.php">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="type">
                                                    <option value="">Loại hình</option>
                                                    <option value="Căn hộ">Căn hộ</option>
                                                    <option value="Nhà ở">Nhà ở</option>
                                                    <option value="Mặt bằng">Mặt bằng</option>
                                                    <option value="Đất nền">Đất nền</option>
                                                    <option value="Văn phòng">Văn phòng</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="stype">
                                                    <option value="">Hình thức</option>
                                                    <option value="Thuê">Thuê</option>
                                                    <option value="Bán">Bán</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <input type="text" id="input-city" class="form-control" name="city" placeholder="Thành phố" placeholder="Toàn quốc" data-toggle="modal" data-target="#modal" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <input type="text" id="input-price" name="price" class="form-control" placeholder="Chọn giá" data-toggle="modal" data-target="#modal" placeholder="Chọn giá" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <input type="text" id="input-acreage" name="acreage" class="form-control" placeholder="Chọn diện tích" data-toggle="modal" data-target="#modal" placeholder="Chọn diện tích" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" name="filter" class="btn btn-success w-100" style="border-radius:5px;">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->


            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modalContent" style="max-height: 500px; overflow-y: auto;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary rounded" id="btn-apply" data-dismiss="modal">Áp dụng</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End -->
            <!--	Banner End  -->

            <!--	Text Block One
		======================================================-->

        <div class="full-row bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Khu vực phổ biến</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 pb-1">
                                <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9" style="width: 300px; height: 350px; margin-left: 40px; border-radius: 10px; filter: drop-shadow(0 0 5px blue); " > <img src="images/thumbnail4/2.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
                                        $query = mysqli_query($con, "SELECT count(state), property.* FROM property where state='Tp Hà Nội'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <h4 class="hover-text-success text-capitalize"><a href="stateproperty.php?id=<?php echo $row['state'] ?>"><?php echo $row['state']; ?></a></h4>
                                            <span><?php
                                                    $total = $row[0];
                                                    echo $total; ?> Bất động sản</span>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 pb-1">
                                <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9" style="width: 300px; height: 350px; margin-left: 28px; border-radius: 10px; filter: drop-shadow(0 0 5px blue);"> <img src="images/thumbnail4/1.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
                                        $query = mysqli_query($con, "SELECT count(state), property.* FROM property where state='Tp Hồ Chí Minh'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <h4 class="hover-text-success text-capitalize"><a href="stateproperty.php?id=<?php echo $row['state'] ?>"><?php echo $row['state']; ?></a></h4>
                                            <span><?php
                                                    $total = $row[0];
                                                    echo $total; ?> Bất động sản</span>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 pb-1">
                                <div class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9" style="width: 300px; height: 350px; margin-left: 17px; border-radius: 10px; filter: drop-shadow(0 0 5px blue);"> <img src="images/thumbnail4/3.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
                                        $query = mysqli_query($con, "SELECT count(state), property.* FROM property where state='Tp Cần Thơ'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <h4 class="hover-text-success text-capitalize"><a href="stateproperty.php?id=<?php echo $row['state'] ?>"><?php echo $row['state']; ?></a></h4>
                                            <span><?php
                                                    $total = $row[0];
                                                    echo $total; ?> Bất động sản</span>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            
            <!-----  Our Services  ---->

            <!--	Recent Properties  -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-secondary double-down-line text-center mb-4">Tin đăng gần đây</h2>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                    <div class="row">




                                        <?php 
                                        $sql = "DELETE FROM property WHERE CURDATE() > DATE_ADD(date, INTERVAL 7 DAY)";

                                        $con->query($sql);
                                         
                                        
                                        $query = mysqli_query($con, "SELECT property.*, user.uname,user.utype,user.uimage,DATE_ADD(date, INTERVAL 7 DAY) AS new_date FROM `property`,`user` WHERE property.uid=user.uid AND CURDATE() <= DATE_ADD(date, INTERVAL 7 DAY)  ORDER BY date DESC LIMIT 9");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>

                                            <div class="col-md-6 col-lg-4">
                                                <div class="featured-thumb hover-zoomer mb-4">
                                                    <div class="overlay-black overflow-hidden position-relative" style="border-radius: 5px;" > <img src="admin/property/<?php echo $row['18']; ?>" alt="pimage">
                                                        <div class="featured bg-success text-white">Mới</div>
                                                        <div class="sale bg-success text-white text-capitalize"><?php echo $row['5']; ?></div>
                                                        <div class="price text-primary"><b><?php echo $row['12']; ?> VNĐ</b><span class="text-white"><?php echo $row['11']; ?> m²</span></div>

                                                    </div>
                                                    <div class="featured-thumb-data shadow-one">
                                                        <div class="p-3">
                                                            <h4 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h4>
                                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['15']; ?> - <?php echo $row['16']; ?></span>
                                                        </div>
                                                        
                                                        <div class="p-3 d-inline-block w-100">
                                                            <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>Nguồn : <?php echo $row['uname']; ?></div>
                                                            <div class="float-left"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo "Ngày đăng: ".date('d-m-Y', strtotime($row['date'])); ?></div>
                                                            <div class="float-left"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo "Ngày hết hạn: ".date('d-m-Y', strtotime($row['new_date'])); ?></div>
                                                            <div class="stars float-right">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Recent Properties  -->

            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center mb-5">Thống kê</h2>
            </div>
            <div class="full-row overlay-secondary" style="background-image: url('images/breadcromb.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="fact-counter">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-home flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-success my-4" data-speed="3000" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Bất động sản hiện có</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-rent flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property where stype='Bán'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-success my-4" data-speed="3000" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Bất động sản bán</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-for-rent flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(pid) FROM property where stype='Thuê'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-success my-4" data-speed="3000" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Bất động sản cho thuê</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-user flat-large text-white" aria-hidden="true"></i>
                                    <?php
                                    $query = mysqli_query($con, "SELECT count(uid) FROM user");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="count-num text-success my-4" data-speed="3000" data-stop="<?php
                                                                                                                $total = $row[0];
                                                                                                                echo $total; ?>">0</div>
                                    <?php } ?>
                                    <div class="text-white h5">Tài khoản đã đăng ký</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="full-row bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Chúng tôi làm gì?</h2>
                        </div>
                    </div>
                    <div class="text-box-one">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s">
                                    <i class="flaticon-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Dịch vụ mua bán</a></h5>
                                    <p>Tại đây, khách hàng có thể tìm kiếm được những căn nhà phù hợp với giá cả hợp lý...</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s">
                                    <i class="flaticon-for-rent text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Dịch vụ cho thuê</a></h5>
                                    <p>Các tiện ích về việc thuê nhà ở, mặt bằng,...cũng được chúng tôi đặc biệt chú trọng đến...</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s">
                                    <i class="flaticon-list text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Các loại hình phổ biến</a></h5>
                                    <p>Căn hộ, nhà ở, mặt bằng,...và nhiều loại hình khác trong lĩnh vực bất động sản...</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s">
                                    <i class="flaticon-diagram text-success flat-medium" aria-hidden="true"></i>
                                    <h5 class="text-secondary hover-text-success py-3 m-0"><a href="#">Tiềm năng phát triển</a></h5>
                                    <p>REALESTATE đã và đang phát triển để trở thành sự lựa chọn đáng tin cậy của bạn...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Quy trình hoạt động</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">1</div>
                                <div class="left-arrow"><i class="flaticon-investor flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Tìm kiếm</h5>
                                <p>Khách hàng sẽ chủ động tìm kiếm và đánh giá các bất động sản theo nhu cầu của bản thân.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">2</div>
                                <div class="left-arrow"><i class="flaticon-search flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Trao đổi</h5>
                                <p>Sẽ có những trao đổi kỹ lưỡng giữa người bán và người mua về những vấn đề mà họ chưa thống nhất.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-thumb-one text-center mb-5">
                                <div class="bg-success text-white rounded-circle position-absolute z-index-9">3</div>
                                <div><i class="flaticon-handshake flat-medium icon-success" aria-hidden="true"></i></div>
                                <h5 class="text-secondary mt-5 mb-4">Giao dịch</h5>
                                <p>Những ràng buộc về ký kết là bước cuối cùng để chốt lại những thỏa thuận mà hai bên đã thống nhất. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--	Why Choose Us -->
            <div class="full-row living bg-one overlay-secondary-half" style="background-image: url('images/01.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="living-list pr-4">
                                <h3 class="pb-4 mb-3 text-white">Tại sao nên chọn chúng tôi?</h3>
                                <ul>
                                    <li class="mb-4 text-white d-flex">
                                        <i class="flaticon-reward flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Xếp hạng hàng đầu</h5>
                                            <p>REALESTATE đã và đang chiếm lĩnh được thị trường và niềm tin của khách hàng.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex">
                                        <i class="flaticon-real-estate flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Mang lại trải nghiệm tốt</h5>
                                            <p>Uy tín - Chất lượng - Sự hài lòng là những tiêu chí đã và đang được khẳng định mạnh mẽ.</p>
                                        </div>
                                    </li>
                                    <li class="mb-4 text-white d-flex">
                                        <i class="flaticon-seller flat-medium float-left d-table mr-4 text-success" aria-hidden="true"></i>
                                        <div class="pl-2">
                                            <h5 class="mb-3">Kinh nghiệm lâu năm</h5>
                                            <p>Với bề dày kinh nghiệm và sự tận tâm chúng tôi cam kết sẽ luôn mang lại những trải nghiệm tốt nhất.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	why choose us -->

            

            <!--	How it work -->
        
            <!--	How It Work -->

            <!--	Achievement
        ============================================================-->
        

            <!--	Testonomial -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content-sidebar p-4">
                                <div class="mb-3 col-lg-12">
                                    <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Đánh giá</h4>
                                    <div class="recent-review owl-carousel owl-dots-gray owl-dots-hover-success">

                                        <?php

                                        $query = mysqli_query($con, "select feedback.*, user.* from feedback,user where feedback.uid=user.uid and feedback.status='Đã duyệt'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <div class="item">
                                                <div class="p-4 bg-success down-angle-white position-relative" style="border-radius:5px;">
                                                    <p class="text-white"><i class="fas fa-quote-left mr-2 text-white"></i><?php echo $row['3']; ?>. <i class="fas fa-quote-right mr-2 text-white"></i></p>
                                                </div>
                                                <div class="p-2 mt-4">
                                                    <span class="text-success d-table text-capitalize"><?php echo $row['uname']; ?></span> <span class="text-capitalize"></span>
                                                </div>
                                            </div>
                                        <?php }  ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Testonomial -->


            <!--	Footer   start-->
            <?php include("include/footer.php"); ?>
            <!--	Footer   start-->


            <!-- Scroll to top -->
            <a href="#" class="bg-success text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
            <!-- End Scroll To top -->
        </div>
    </div>
    <!-- Wrapper End -->

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
    <script src="js/YouTubePopUp.jquery.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
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
                        console.error("Lỗi khi gọi API: " + error);
                    });
            }
        }
        fetchPrefectures();
        // end biến toàn cục thành phố

        $("#input-city").click(function() {
            remove()
            $("#modalLabel").html('Chọn thành phố');
            const prefecturesElement = prefectures.map(item =>
                `<div class="form-check form-check-inline">
                    <input class="form-check-input radio-value" type="radio" name="radio-value" id="radio${item.id}" value="${item.id}" data-name="${item.label}">
                    <label class="form-check-label" for="radio${item.id}">${item.label}</label>
                </div>
                <div class="dropdown-divider"></div>`);
            const typeApply = "btn-city-apply"
            $("#modalContent").html(prefecturesElement);
            $('#btn-apply').addClass(typeApply)
            cityContent(prefecturesElement)

            $('#btn-apply').click(function() {
                if ($('#btn-apply').hasClass(typeApply)) {
                    const address = $('#modalLabel').text();
                    if (address === 'Chọn thành phố') {
                        $('#input-city').val("");
                    } else {
                        $('#input-city').val(address);
                    }
                }
            });
        });

        function cityContent(prefecturesElement) {
            $(".radio-value").click(function() {
                const optionId = $(this).val();
                const namePrefecture = `<i id="back" class="fas fa-chevron-left mr-2 cursor-poiter"></i>${$(this).data('name')}`;
                $("#modalLabel").html(namePrefecture);
                fetch(`https://mo-dev.ment.vn/api/v1/prefectures/${optionId}/cities`)
                    .then(response => response.json())
                    .then(data => {
                        const cities = data.cities.map(item => ({
                            id: item.id,
                            label: item.name,
                        }));
                        const cityElements = cities.map(item =>
                            `<div class="form-check form-check-inline">
                                <input class="form-check-input radio-city" type="radio" name="radio-value" id="radio${item.id}" value="${item.id}" data-name="${item.label}">
                                <label class="form-check-label" for="radio${item.id}">${item.label}</label>
                            </div>
                            <div class="dropdown-divider"></div>`);

                        $("#modalContent").html(cityElements);

                        backPrefacture(prefecturesElement);

                        $(".radio-city").click(function() {
                            const nameCity = $(this).data('name');
                            $("#modalLabel").html(`${namePrefecture}, ${nameCity}`);
                            backPrefacture(prefecturesElement)
                        })
                    })
                    .catch(error => {
                        console.error("Lỗi khi gọi API: " + error);
                    });
            });
        }

        function backPrefacture(prefecturesElement) {
            $("#back").click(function() {
                $("#modalLabel").html('Chọn thành phố');
                $("#modalContent").html(prefecturesElement);
                cityContent(prefecturesElement)
            });
        }

        $("#input-price").click(function() {
            remove()
            const price = [{
                    label: "Dưới 1",
                    value: [0, 1]
                },
                {
                    label: "Từ 1 - 2",
                    value: [1, 2]
                }, {
                    label: "Từ 2 - 3",
                    value: [2, 3]
                }, {
                    label: "Từ 3 - 5",
                    value: [3, 5]
                }, {
                    label: "Từ 5 - 7",
                    value: [5, 7]
                }, {
                    label: "Từ 7 - 10",
                    value: [7, 10]
                }, {
                    label: "Từ 10 - 15",
                    value: [10, 15]
                }, {
                    label: "Trên 15",
                    value: [15, 15]
                }
            ]
            const header = `<div class="text-center text-bold font-weight-bolder"><h4 id="sliderValue" class="value-slider">Từ 0 - 15 triệu</h4></div>
                            <div id="root-slider"><div id="slider"></div></div>
                            <div class="text"><strong>Chọn nhanh</strong></div>`
            const body = `<div class="d-flex flex-wrap">${price.map(item =>`<button class="btn btn-secondary btn-sm mb-2 mr-2 rounded option-slider"
                            data-value="${item.value}"> ${item.label} triệu</button>`).join('')}</div>`
            const typeApply = "btn-price-apply"

            $('#btn-apply').addClass(typeApply)
            $("#modalLabel").html("Chọn giá");
            $("#modalContent").html(header + body);
            if ($('#slider')) {
                showSlider({
                    min: 0,
                    max: 15,
                    step: 1,
                    value: [0, 15],
                }, "", "Từ ", "triệu")
            }

            $('.option-slider').click(function() {
                const value = $(this).text();
                const dataValue = $(this).data('value');
                const arrayValue = dataValue.split(",").map(item => parseInt(item))
                $('.slider').remove();
                $('#slider').remove();

                const newSlider = $('<div id="slider"></div>');

                $('#root-slider').append(newSlider);
                showSlider({
                    min: 0,
                    max: 15,
                    step: 1,
                    value: arrayValue,
                }, value, "Từ ", "triệu")
            });

            $('#btn-apply').click(function() {
                if ($('#btn-apply').hasClass(typeApply)) {
                    const valueSlider = $('.value-slider').text();
                    $('#input-price').val(valueSlider);
                    $('#value-price').val(234);
                }
            });
        });

        $("#input-acreage").click(function() {
            remove()
            const acreage = [{
                    label: "Dưới 20",
                    value: [0, 20]
                },
                {
                    label: "Từ 20 - 30",
                    value: [20, 30],
                },
                {
                    label: "Từ 30 - 50",
                    value: [30, 50],
                },
                {
                    label: "Từ 50 - 70",
                    value: [50, 70],
                },
                {
                    label: "Từ 70 - 90",
                    value: [70, 90],
                },
                {
                    label: "Trên 90",
                    value: [90, 90],
                }
            ]
            const header = `<div class="text-center text-bold font-weight-bolder"><h4 id="sliderValue" class="value-slider">Từ 0-90 m2</h4></div>
                            <div id="root-slider"><div id="slider"></div></div>
                            <div class="text"><strong>Chọn nhanh</strong></div>`
            const body = `<div class="d-flex flex-wrap">${acreage.map(item =>`<button class="btn btn-secondary btn-sm mb-2 mr-2 rounded option-slider"
                data-value="${item.value}"> ${item.label} m2</button>`).join('')}</div>`
            const typeApply = "btn-acreage-apply"
            $('#btn-apply').addClass(typeApply)
            $("#modalLabel").html("Chọn diện tích");
            $("#modalContent").html(header + body);
            if ($('#slider')) {
                showSlider({
                    min: 0,
                    max: 90,
                    step: 5,
                    value: [0, 90],
                }, "", "Từ ", "m2")
            }
            $('.option-slider').click(function() {
                const dataValue = $(this).data('value');
                const value = $(this).text();
                const arrayValue = dataValue.split(",").map(item => parseInt(item))
                $('.slider').remove();
                $('#slider').remove();

                const newSlider = $('<div id="slider"></div>');

                $('#root-slider').append(newSlider);
                showSlider({
                    min: 0,
                    max: 90,
                    step: 5,
                    value: arrayValue,
                }, value, "Từ ", "m2")
            });

            $('#btn-apply').click(function() {
                if ($('#btn-apply').hasClass(typeApply)) {
                    const valueSlider = $('.value-slider').text();
                    $('#input-acreage').val(valueSlider);
                    $('#value-acreage').val(123);
                }
            });
        });

        function remove() {
            $('#btn-apply').removeClass("btn-city-apply")
            $('#btn-apply').removeClass("btn-price-apply")
            $('#btn-apply').removeClass("btn-acreage-apply")
        }

        function showSlider(data = {}, label = "", prefix = "", unit = "") {
            const slider = $("#slider");
            const sliderValue = $("#sliderValue");

            slider.slider({
                ...data,
                tooltip: 'hide',
            }).on('slide', function(slideEvt) {
                sliderValue.text(prefix + slideEvt.value[0] + " - " + slideEvt.value[1] + unit);
            });
            if (label) {
                sliderValue.text(label);
            }
        }
    </script>
</body>

</html>