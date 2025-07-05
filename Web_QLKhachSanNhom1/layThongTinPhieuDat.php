<?php
include("ketnoi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ma_phieu_dat'])) {
    $ma_phieu_dat = $_POST['ma_phieu_dat'];
    
    $sql = "SELECT kh.ho_ten AS ho_ten_khach_hang, lp.ten_loai AS loai_phong, pd.ngay_nhan, pd.ngay_tra, pd.tong_tien, pd.tien_coc, lp.gia_phong
            FROM phieu_dat pd
            JOIN khach_hang kh ON pd.ma_kh = kh.ma_kh
            JOIN loai_phong lp ON pd.ma_loai = lp.ma_loai
            WHERE pd.ma_phieu_dat = '$ma_phieu_dat'";
    
    $result = mysqli_query($conn, $sql) or die("Không thể truy vấn: " . mysqli_error($conn));
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode(['ho_ten_khach_hang' => '', 'loai_phong' => '', 'ngay_nhan' => '', 'ngay_tra' => '', 'gia_phong' => '', 'tong_tien' => '', 'tien_coc' => '']);
    }
}
?>

