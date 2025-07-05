<?php
include 'ketnoi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_kh = $_POST['ma_kh'];
    $ma_loai = $_POST['ma_loai'];
    $noi_dung = $_POST['noi_dung'];
    $ngay_danh_gia = $_POST['ngay_danh_gia'];

    $sql = "INSERT INTO danh_gia (ma_kh, ma_loai, noi_dung, ngay_danh_gia) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
        exit;
    }
    $stmt->bind_param("iiss", $ma_kh, $ma_loai, $noi_dung, $ngay_danh_gia);

    if ($stmt->execute()) {
        header("Location: xemphong.php?loai_phong=" . urlencode($ma_loai));
        exit();
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>

