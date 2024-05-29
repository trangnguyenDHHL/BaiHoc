<?php
// Kiểm tra xem ID của sản phẩm cần chỉnh sửa có được truyền từ URL không
if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
    $product_id = intval($_GET["id"]);
    
    // Kết nối CSDL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "productdb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }
    
    // Lấy thông tin của sản phẩm từ CSDL dựa trên ID
    $sql = "SELECT id, pname, company, year, band FROM user WHERE id = ?";
    if($stmt = $conn->prepare($sql)){
        // Liên kết tham số với câu lệnh SQL
        $stmt->bind_param("i", $product_id);
        
        // Thực thi câu lệnh SQL
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            // Kiểm tra số hàng trả về
            if($result->num_rows == 1){
                // Lấy dữ liệu từ hàng kết quả
                $row = $result->fetch_assoc();
                
                // Hiển thị biểu mẫu chỉnh sửa sản phẩm với các giá trị được điền sẵn và bảo mật
                ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Chỉnh sửa sản phẩm</title>
                </head>
                <body>
                    <h1>Chỉnh sửa sản phẩm</h1>
                    <form action="update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <p>Name: <input type="text" name="pname" value="<?php echo htmlspecialchars($row['pname']); ?>"></p>
                        <p>Company: <input type="text" name="company" value="<?php echo htmlspecialchars($row['company']); ?>"></p>
                        <p>Year: <input type="text" name="year" value="<?php echo htmlspecialchars($row['year']); ?>"></p>
                        <p>Band: <input type="text" name="band" value="<?php echo htmlspecialchars($row['band']); ?>"></p>
                        <p><input type="submit" value="Cập nhật"></p>
                    </form>
                </body>
                </html>
                <?php
            } else{
                echo "Không tìm thấy sản phẩm.";
            }
        } else{
            echo "Oops! Đã có lỗi. Vui lòng thử lại sau.";
        }
    }
    
    // Đóng kết nối
    $conn->close();
} else{
    echo "Tham số ID không hợp lệ hoặc không được truyền.";
}
?>