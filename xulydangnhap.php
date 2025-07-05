<?php
session_start();
include("ketnoi.php");

// Lấy thông tin đăng nhập từ form
$user = $_POST['user'];
$pass = $_POST['pass'];


// Tránh SQL Injection
$user = mysqli_real_escape_string($conn, $user);
$pass = mysqli_real_escape_string($conn, $pass);

// Tìm kiếm tài khoản nhân viên trong CSDL
$sql_nv = "SELECT * FROM nhan_vien WHERE user='$user' AND pass='$pass'";
$result_nv = mysqli_query($conn, $sql_nv);

// if (mysqli_num_rows($result_nv) == 1) {
//     // Tài khoản nhân viên hợp lệ, lấy thông tin người dùng
//     $row_nv = mysqli_fetch_assoc($result_nv);
//     $quyen_nv = $row_nv['quyen'];
//     $ho_ten_nv = $row_nv['ho_ten'];
//     $ma_nv = $row_nv['ma_nv'];

//     // Lưu tên người dùng vào session
//     $_SESSION['ho_ten'] = $ho_ten_nv;
//     $_SESSION['user'] = $user;
//     $_SESSION['ma_nv'] = $ma_nv; // Lưu mã nhân viên vào session

//     // Chuyển hướng dựa vào quyền nhân viên
//     if ($quyen_nv == 0) {
//         header("Location: index.php");
//         exit();
//     } elseif ($quyen_nv == 1) {
//         header("Location: index.php");
//         exit();
//     }
if (mysqli_num_rows($result_nv) == 1) {
    $row_nv = mysqli_fetch_assoc($result_nv);
    $quyen_nv = $row_nv['quyen'];
    $ho_ten_nv = $row_nv['ho_ten'];
    $ma_nv = $row_nv['ma_nv'];

    $_SESSION['ho_ten'] = $ho_ten_nv;
    $_SESSION['user'] = $user;
    $_SESSION['ma_nv'] = $ma_nv;
    $_SESSION['quyen'] = $quyen_nv; // Lưu quyền vào session

    if ($quyen_nv == 0) {
        header("Location: QLLP.php");
        exit();
    } elseif ($quyen_nv == 1) {
        header("Location: thongkeloaiphong.php");
        exit();
    }
}

// Tìm kiếm tài khoản khách hàng trong CSDL
$sql_kh = "SELECT * FROM khach_hang WHERE emailkh='$user' AND matkhaukh='$pass'";
$result_kh = mysqli_query($conn, $sql_kh);

// if (mysqli_num_rows($result_kh) == 1) {
//     // Tài khoản khách hàng hợp lệ, lấy thông tin khách hàng
//     $row_kh = mysqli_fetch_assoc($result_kh);
//     $ho_ten_kh = $row_kh['ho_ten'];
    
//     // Lưu tên khách hàng vào session
//     $_SESSION['ma_kh'] = $row_kh['ma_kh']; // Lưu mã khách hàng vào session
//     $_SESSION['ho_ten'] = $ho_ten_kh;
//     $_SESSION['user'] = $user;

//     // Chuyển hướng khách hàng đến trang chủ
//     header("Location: trangchu.php");
//     exit();
// }

if (mysqli_num_rows($result_kh) == 1) {
    $row_kh = mysqli_fetch_assoc($result_kh);
    $ho_ten_kh = $row_kh['ho_ten'];
    
    $_SESSION['ma_kh'] = $row_kh['ma_kh'];
    $_SESSION['ho_ten'] = $ho_ten_kh;
    $_SESSION['user'] = $user;

    header("Location: trangchu.php");
    exit();
}

// Đăng nhập không thành công, xử lý tại đây (ví dụ: thông báo lỗi)
echo "Email hoặc mật khẩu không đúng.";

// Đóng kết nối CSDL
mysqli_close($conn);
?>
