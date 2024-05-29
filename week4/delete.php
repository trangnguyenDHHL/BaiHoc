<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "productdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra xem tham số ID đã được truyền qua URL hay không
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Chuẩn bị câu lệnh SQL để xóa bản ghi
    $sql = "DELETE FROM user WHERE id = ?";
    
    if($stmt = $conn->prepare($sql)){
        // Liên kết tham số với câu lệnh SQL
        $stmt->bind_param("i", $param_id);
        
        // Thiết lập giá trị tham số
        $param_id = trim($_GET["id"]);
        
        // Thực thi câu lệnh xóa
        if($stmt->execute()){
            // Redirect về trang danh sách sản phẩm sau khi xóa thành công
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Đã có lỗi. Vui lòng thử lại sau.";
        }
    }
     
    // Đóng câu lệnh
    $stmt->close();
}

// Đóng kết nối
$conn->close();
?>
