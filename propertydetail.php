<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
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

            <!--	Banner   --->
            <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Chi tiết tin đăng</b></h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-left float-md-right">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Chi tiết tin đăng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Banner   --->


            <div class="full-row">
                <div class="container">
                    <div class="row">

                        <?php

                       
                        $id = $_REQUEST['pid'];
                        $query = mysqli_query($con, "SELECT property.*, user.*,DATE_ADD(date, INTERVAL 7 DAY) AS new_date FROM `property`,`user` WHERE property.uid=user.uid and pid='$id'");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>

                            <div class="col-lg-8">

                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;">
                                            <!-- Slide 1-->
                                            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['18']; ?>" class="ls-bg" alt="" /> </div>

                                            <!-- Slide 2-->
                                            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['19']; ?>" class="ls-bg" alt="" /> </div>

                                            <!-- Slide 3-->
                                            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['20']; ?>" class="ls-bg" alt="" /> </div>

                                            <!-- Slide 4-->
                                            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['21']; ?>" class="ls-bg" alt="" /> </div>

                                            <!-- Slide 5-->
                                            <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['22']; ?>" class="ls-bg" alt="" /> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">

                                    <div class="col-md-6">

                                        <div class="bg-success d-table px-3 py-2 rounded text-white"><?php echo $row['25']; ?></div>
                                        <h2 class="mt-2 text-secondary text-capitalize"><?php echo $row['1']; ?></h2>
                                       
                                    </div>

    

                                    <div class="col-md-6">
                                    
                                        <div class="text-success text-left h5 my-2 text-md-right">Giá: <?php echo $row['12']; ?> VNĐ</div>
                                    </div>

                                    <div class="col-md-10">
                                    <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> Địa chỉ: &nbsp;<?php echo $row['13']; ?> - <?php echo $row['15']; ?> - <?php echo $row['16']; ?></span>

                                    </div>
                                    <!-- map -->
                                    <div class="col-12 map" style="height: 300px">
                                        <?php
                                        // $lng = 16.476276932778156; // value lng
                                        // $lat = 107.60069071434165; // value lat
                                        // $center = "center=$lat,$lng" // option url
                                        $apiKey = "AIzaSyDaOulQACiJzBfqumbsqg_-vKha8fCnL-s";
                                        $address = $row['location'].",".$row['city'].",".$row['state'];
                                        $url = "https://www.google.com/maps/embed/v1/place?key=$apiKey&q=$address&zoom=15";
                                        ?>
                                        <iframe src="<?php echo $url; ?>" frameborder="0" style="border: 0" class="w-100 h-100"></iframe>
                                    </div>
                                    <!-- end map -->
                                </div>
                                <div class="property-details">
                                
                                    <h5 class="text-secondary my-4">Thông tin mô tả</h5>
                                    <p><?php echo $row['2']; ?></p>

                                    <h5 class="mt-5 mb-4 text-secondary">Tóm tắt bất động sản</h5>
                                    <div class="table-striped font-14 pb-2">
                                        <table class="w-100">
                                            <tbody>
                                                <tr>
                                                    <td>Loại hình:</td>
                                                    <td class=""><?php echo $row['3']; ?></td>
                                                    <td>Diện tích:</td>
                                                    <td class=""><?php echo $row['11']; ?> m²</td>
                                                </tr>
                                                <tr>
                                                    <td>Phòng khách:</td>
                                                    <td class=""><?php echo $row['4']; ?> phòng</td>
                                                    <td>Phòng bếp:</td>
                                                    <td class=""><?php echo $row['9']; ?> phòng</td>
                                                </tr>
                                                <tr>
                                                    <td>Phòng tắm:</td>
                                                    <td class=""><?php echo $row['7']; ?> phòng</td>
                                                    <td>Phòng ngủ:</td>
                                                    <td class=""><?php echo $row['6']; ?> phòng</td>
                                                </tr>
                                                <tr>
                                                    <td>Ban công:</td>
                                                    <td class=""><?php echo $row['8']; ?></td>
                                                    <td>Nhà vệ sinh:</td>
                                                    <td class=""><?php echo $row['10']; ?> phòng</td>
                                                </tr>
                                                <tr>
                                                    <td>Tỉnh/Thành phố:</td>
                                                    <td class="text-capitalize"><?php echo $row['16']; ?></td>
                                                    <td>Quận/Huyện:</td>
                                                    <td class="text-capitalize"><?php echo $row['15']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Địa chỉ:</td>
                                                    <td class="text-capitalize"><?php echo $row['13']; ?></td>
                                                    <td>Giảm giá:</td>
                                                    <td class=""><?php echo $row['14']; ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <h5 class="mt-5 mb-4 text-secondary">Đặc điểm tin đăng</h5>
                                    <div class="table-striped font-14 pb-2">
                                        <table class="w-100">
                                            <tbody>
                                                <tr>
                                                    <td>Mã tin:</td>
                                                    <td class="text-capitalize">#<?php echo $row['0']; ?></td>
                    
                                                </tr>
                                                <tr>
                                                    <td>Đối tượng:</td>
                                                    <td class=""> <span>Tất cả</span></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Ngày đăng:</td>
                                                    <td class=""><?php echo $row['29']; ?></td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td>Ngày hết hạn:</td>
                                                    <td class=""><?php echo $row['new_date']; ?></td>
                                                    
                                                </tr>
                                    

                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <h5 class="mt-5 mb-4 text-secondary">Sơ đồ</h5>
                                    <div class="accordion" id="accordionExample">
                                        <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Sơ đồ 1 </button>
                                        <div id="collapseOne" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <img src="admin/property/<?php echo $row['26']; ?>" alt="Not Available">
                                        </div>
                                        <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Sơ đồ 2</button>
                                        <div id="collapseTwo" class="collapse p-4" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <img src="admin/property/<?php echo $row['27']; ?>" alt="Not Available">
                                        </div>
                                        <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Sơ đồ 3</button>
                                        <div id="collapseThree" class="collapse p-4" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <img src="admin/property/<?php echo $row['28']; ?>" alt="Not Available">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <a class="btn btn-danger d-none d-xl-block fas fa-flag" style="border-radius:5px; margin-top: 20px;" href="profile.php"> Báo cáo vi phạm</a>
                                       
                                    </div>

                                    

                                    <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Thông tin liên hệ</h5>
                                    <div class="agent-contact pt-60">
                                        <div class="row">
                                            <div class="col-sm-4 col-lg-3"> <img src="admin/user/<?php echo $row['uimage']; ?>" alt="" height="200" width="170"> </div>
                                            <div class="col-sm-8 col-lg-9">
                                                <div class="agent-data text-ordinary mt-sm-20">
                                                    <h6 class=""><b>Liên hệ:</b> <?php echo $row['uname']; ?></h6>
                                                    <h6 class=""><b>Điện thoại:</b> <?php echo $row['uphone']; ?></h6>
                                                    <h6 class=""><b>Zalo:</b> <?php echo $row['uzalo']; ?></h6>
                                                    <h6 class=""><b>Email:</b> <?php echo $row['uemail']; ?></h6>
                                            

                                                    <div class="mt-3 text-secondary hover-text-success">
                                                        <ul>
                                                            <li class="float-left mr-3"><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li class="float-left mr-3"><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                                            <li class="float-left mr-3"><a href="https://mail.google.com/"><i class="fab fa-google-plus-g"></i></a></li>
                                                            <li class="float-left mr-3"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                            <li class="float-left mr-3"><a href="#"><i class="fas fa-rss"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <div class="col-lg-4">
                           
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Bảng tính</h4>
                            <form class="d-inline-block w-100" action="calc.php" method="post">
                                <label class="sr-only">Số lượng bất động sản</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> VNĐ</div>
                                    </div>
                                    <input type="text" class="form-control" name="amount" placeholder="Giá bất động sản">
                                </div>
                                <label class="sr-only">Số tháng</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="month" placeholder="Số tháng">
                                </div>
                                <label class="sr-only">Lãi suất</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                    <input type="text" class="form-control" name="interest" placeholder="Lãi suất">
                                </div>
                                <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4" style="border-radius:5px;">Tính trả góp</button>
                            </form>
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Tin đăng nổi bật</h4>
                            <ul class="property_list_widget">

                                <?php
                                $query = mysqli_query($con, "SELECT * FROM `property` WHERE isFeatured = 1 ORDER BY date DESC LIMIT 3");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <li> <img src="admin/property/<?php echo $row['18']; ?>" style="border-radius: 3px;" alt="pimage">
                                        <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h6>
                                        <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['15']; ?> - <?php echo $row['16']; ?></span>

                                    </li>
                                <?php } ?>

                            </ul>

                            <div class="sidebar-widget mt-5">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Tin đăng mới nhất</h4>
                                <ul class="property_list_widget">

                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM `property` ORDER BY date DESC LIMIT 7");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <li> <img src="admin/property/<?php echo $row['18']; ?> " style="border-radius: 3px;" alt="pimage">
                                            <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h6>
                                            <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['15']; ?> - <?php echo $row['16']; ?></span>

                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--	Footer   start-->
            <?php include("include/footer.php"); ?>
            <!--	Footer   start-->


            <!-- Scroll to top -->
            <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
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
    <script src="js/custom.js"></script>

</body>

</html>