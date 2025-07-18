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

    .table th, .table td {
        text-align: center; 
        vertical-align: middle; 
        
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>THÔNG TIN CHI TIẾT VẬT TƯ</h6>
            </div>
            <a class="btthem" href="themQLCTVT.php"><button><ion-icon name="add-circle"></ion-icon>Thêm</button></a>


            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã chi tiết</th>
                            <th>Tên phòng</th>
                            <th>Tên vật tư</th>
                            <th>Số lượng</th>
                            <th>Tình trạng</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from chi_tiet_vat_tu ";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error($conn));
                        while ($row = mysqli_fetch_array($kq)) {

                            $phongs = $row["ma_phong"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql2 = "SELECT * FROM phong WHERE ma_phong ='" . $phongs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin" . mysqli_error($conn));
                            $phong = mysqli_fetch_array($kq2);

                            $vat_tus = $row["ma_vat_tu"];
                            $sql3 = "SELECT * FROM vat_tu WHERE ma_vat_tu ='" . $vat_tus . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin" . mysqli_error($conn));
                            $vat_tu = mysqli_fetch_array($kq3);

                            echo "<td>" . $row["ma_ctvt"] . "</td>";
                            $usern = $row["ma_ctvt"];
                            echo "<td>" . $phong["ten_phong"] . "</td>";
                            echo "<td>" . $vat_tu["ten_vat_tu"] . "</td>";
                            echo "<td>" . $row["so_luong_trong_phong"] . "</td>";
                            echo "<td>" . $row["tinh_trang"] . "</td>";
                            echo "<td class='btt'>

                    <a href='suaQLCTVT.php?user=$usern'><button class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                    </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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

</script>