<?php
include 'ketnoi.php';

function ghi_log($ma_nv, $hanh_dong) {
    global $conn; 

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    
    $sql = "INSERT INTO log (ma_nv, hanh_dong, ngay) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    // Kiểm tra lỗi prepare
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Kiểm tra nếu $ma_nv không phải số thì ép thành NULL
    if (!is_numeric($ma_nv)) {
        $ma_nv = null;
    }

    $stmt->bind_param("is", $ma_nv, $hanh_dong);

    if (!$stmt->execute()) {
        die("Lỗi ghi log: " . $stmt->error);
    }

    $stmt->close();
}
?>
