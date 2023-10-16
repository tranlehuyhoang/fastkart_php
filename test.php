<?php
// Thay đổi các thông tin sau đây cho phù hợp với cấu hình cơ sở dữ liệu của bạn
$servername = "localhost";
$username = "dickensb2_wp395";
$password = "--p4Sn4Oy1";
$dbname = "dickensb2_wp395";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xóa tất cả các bảng trong cơ sở dữ liệu
$sql = "SHOW TABLES";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $tableName = $row['Tables_in_' . $dbname];
//         $sql = "DROP TABLE IF EXISTS $tableName";
//         if ($conn->query($sql) === false) {
//             echo "Lỗi khi xóa bảng $tableName: " . $conn->error;
//         } else {
//             echo "Đã xóa bảng $tableName thành công.<br>";
//         }
//     }
// } else {
//     echo "Không có bảng trong cơ sở dữ liệu.";
// }

// Đóng kết nối
$conn->close();
