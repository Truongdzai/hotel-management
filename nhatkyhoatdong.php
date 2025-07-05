<?php include ("header.php");
include ("ketnoi.php");
?>

<style>
    .btthem>button {
        display: flex;
        color: #fafafa;
        font-weight: bolder;
        border: none;
        background-color: #D04848;
        border-radius: 3px;
        margin-left: 15px;
        margin-top: 20px;
        gap: 2px;
        justify-content: center;
        align-items: center;
    }

    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600;
        margin: 2px;
    }
    .pencil {
        color: #FFC100;
        height: 25px;
        border: 1.5px solid #FFC100;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
    }
    

    .btt {
        display: flex;
        gap: 4px;
        align-items: center;
        justify-content: center;
        /* height: 80px; */
    }

    .trash {
        color: #65B741;
        height: 25px;
        border: 1.5px solid #65B741;
        background-color: white;
        border-radius: 3px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
font-size: 14px;
    }
    
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>NHẬT KÝ HOẠT ĐỘNG</h6>
            </div>
            <!-- <a class="btthem" href="themQLP.php"> <button>
                    <ion-icon name="add-circle"></ion-icon>
                    Thêm</button></a> -->

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="15%">Mã hoạt động</th>
                            <th width="15%">Tên nhân viên</th>
                            <th width="50%">Hành động</th>
                            <th width="20%">Ngày giờ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from log";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error($conn));

                        while ($row = mysqli_fetch_array($kq)) {
                            $nhan_viens = $row["ma_nv"];
                            $sql2 = "SELECT * FROM nhan_vien WHERE ma_nv='" . $nhan_viens . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin" . mysqli_error($conn));
                            $nhan_vien = mysqli_fetch_array($kq2);
                            echo "<tr>";

                            echo "<td>" . $row["ma_log"] . "</td>";
                            $usern = $row["ma_log"];
                            echo "<td>" . $nhan_vien["ho_ten"] . "</td>";
                            echo "<td>" . $row["hanh_dong"] . "</td>";
                            echo "<td>" . $row["ngay"] . "</td>";
                            // echo "<td>" . $row["dien_tich"] . "</td>";
                            // echo "<td>" . $row["chi_tiet_phong"] . "</td>";
                //             echo "<td class='btt'>
                //     <a href='suaQLP.php?user=$usern'><button class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                //     <button class='trash' onclick='showPopup(\"xoaQLP.php?user=$usern\")'><ion-icon name='trash'></ion-icon></button>
                // </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <div id="popup" class="popup">
    <div class="popup-content">
        <p>Bạn có chắc chắn muốn xóa phòng này không?</p>
        <div class="popup-buttons">
            <button class="confirm" id="confirmDelete">Xóa</button>
            <button class="cancel" onclick="hidePopup()">Hủy</button>
        </div>
    </div>
</div> -->
<?php include ("footer.php"); ?>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Đang hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Đang hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(đã lọc từ tổng số _MAX_ mục)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả phù hợp",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Tiếp",
                    "previous": "Trước"
                },
                "aria": {
                    "sortAscending": ": sắp xếp tăng dần",
                    "sortDescending": ": sắp xếp giảm dần"
                },
                "searchPlaceholder": "Tìm kiếm..."
            },
            "pageLength": 10,
        });
    });
    // function showPopup(url) {
    //     document.getElementById('popup').style.display = 'flex';
    //     document.getElementById('confirmDelete').onclick = function() {
    //         window.location.href = url;
    //     };
    // }

    // function hidePopup() {
    //     document.getElementById('popup').style.display = 'none';
    // }
</script>