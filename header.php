<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $quyen = isset($_SESSION['quyen']) ? $_SESSION['quyen'] : 1;
}

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: dangnhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/rose1.png" rel="icon">
    <title>The Rose Hotel - The Rose Hotel</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  -->
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo/rose1.png">
                </div>
                <div class="sidebar-brand-text mx-3">The Rose Hotel</div>
            </a>
            <hr class="sidebar-divider my-0">
            <!-- Chỉ hiển thị thống kê nếu người dùng có quyền = 1 -->
            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-fw fa-solid fa-server"></i>
                    <span>Thống kê</span>
                </a>
                <div id="collapseForm" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thống kê</h6>
                        <a class="collapse-item" href="thongkeloaiphong.php">Thống kê loại phòng</a>
                        <!-- <a class="collapse-item" href="doanhthutheothang.php">Thống kê doanh thu</a> -->
                    </div>
                </div>
            </li>
            <?php } ?>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                QUẢN LÝ PHÒNG
            </div>
            <li class="nav-item">
                <a class="nav-link" href="QLLP.php">
                    <i class="fas fa-fw fa-solid fa-building"></i>
                    <span>Loại phòng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="QLP.php">
                    <i class="fas fa-fw fa-solid fa-door-closed"></i>
                    <span>Phòng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                    aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-fw fa-solid fa-server"></i>
                    <span>Thiết bị</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thiết bị</h6>
                        <a class="collapse-item" href="QLTB.php">Quản lý thiết bị</a>
                        <a class="collapse-item" href="QLCTTB.php">Chi tiết thiết bị</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                    aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="fas fa-fw fa-solid fa-suitcase-rolling"></i>
                    <span>Vật tư</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Vật tư</h6>
                        <a class="collapse-item" href="QLVT.php">Quản lý vật tư</a>
                        <a class="collapse-item" href="QLCTVT.php">Chi tiết vật tư</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                QUẢN LÝ ĐẶT PHÒNG
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                    aria-expanded="true" aria-controls="collapseTable">
                    <i class="fas fa-fw fa-regular fa-id-card"></i>
                    <span>Phiếu đặt phòng</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Phiếu đặt phòng</h6>
                        <a class="collapse-item" href="QLPD.php">Phiếu đặt</a>
                        <a class="collapse-item" href="phanphong.php">Phân phòng</a>
                    </div>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="QLHD.php">
                    <i class="fas fa-fw fa-solid fa-receipt"></i>
                    <span>Hoá đơn</span>
                </a>
            </li> -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                QUẢN LÝ CHUNG
            </div>
            <li class="nav-item">
                <a class="nav-link" href="QLKH.php">
                    <i class="fas fa-fw fa-solid fa-address-book"></i>
                    <span>Khách hàng</span>
                </a>
            </li>
            <!-- Chỉ hiển thị mục Quản lý nhân viên nếu người dùng có quyền khác 0 -->
            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="QLNV.php">
                    <i class="fas fa-fw fa-solid fa-users"></i>
                    <span>Nhân viên</span>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="QLTT.php">
                    <i class="fas fa-fw fa-solid fa-newspaper"></i>
                    <span>Tin tức</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="QLHA.php">
                    <i class="fas fa-fw fa-regular fa-images"></i>
                    <span>Hình ảnh</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="QLDG.php">
                    <i class="fas fa-fw fa-solid fa-comment"></i>
                    <span>Đánh giá</span>
                </a>
            </li>
            <?php if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="nhatkyhoatdong.php">
                <i class="fas fa-fw fa-solid fa-signal"></i>
                    <span>Nhật ký hoạt động</span>
                </a>
            </li>
            <?php } ?>
        </ul> 
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" style="color:white" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li> -->
            <li class="nav-item dropdown no-arrow mx-1">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
   aria-haspopup="true" aria-expanded="false">
   <i class="fas fa-bell fa-fw"></i>
   <span class="badge badge-danger badge-counter" id="notification-counter">0</span>
</a> -->

              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">2</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                      having.</div>
                    <div class="small text-gray-500">Udin Cilok · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-default"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
                      say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Jaenab · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li> -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tasks fa-fw"></i>
                <span class="badge badge-success badge-counter">3</span>
              </a> -->
            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Task
                </h6>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Design Button
                      <div class="small float-right"><b>50%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Make Beautiful Transitions
                      <div class="small float-right"><b>30%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Create Pie Chart
                      <div class="small float-right"><b>75%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>
              </div> -->
            <!-- </li> -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <!-- <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px"> -->
                <span style="margin-top:20px; font-size: 15px;" class="ml-2 d-none d-lg-inline text-white small">
                  <?php
                  // Kiểm tra xem session có tồn tại và có chứa tên người dùng không
                  if (isset($_SESSION['ho_ten'])) {
                    echo '<p>' . $_SESSION['ho_ten'] . '</p>';
                  } else {
                    echo '<p>Chua dang nhap</p>';
                  }
                  ?>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="thongtinquantri.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thông tin cá nhân
                  <!-- <a class="dropdown-item" href="nhatkyhoatdong.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Nhật ký hoạt động
                  </a> -->
                  <div class="dropdown-divider"></div>
                  <!-- <a class="dropdown-item" href="dangxuat.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a> -->
                  <a class="dropdown-item" href="dangxuat.php"> <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Đăng xuất</a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">    
  
