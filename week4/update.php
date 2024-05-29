<!DOCTYPE html>
<html>
<head>
    <title>Sửa sản phẩm</title>
</head>
<body>
    <h1>Sửa sản phẩm</h1>

    <?php
    // Kiểm tra nếu có tham số ID truyền từ URL và nó không rỗng
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Kết nối CSDL
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "productdb";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        // Lấy thông tin sản phẩm từ CSDL dựa trên ID
        $sql = "SELECT id, pname, company, year, band FROM user WHERE id = ?";
        if($stmt = $conn->prepare($sql)){
            // Liên kết tham số với câu lệnh SQL
            $stmt->bind_param("i", $param_id);
            
            // Thiết lập giá trị tham số
            $param_id = trim($_GET["id"]);
            
            // Thực thi câu lệnh SQL
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                // Kiểm tra số hàng trả về
                if($result->num_rows == 1){
                    // Lấy dữ liệu từ hàng kết quả
                    $row = $result->fetch_assoc();
                    
                    // Hiển thị biểu mẫu chỉnh sửa sản phẩm với các giá trị được điền sẵn
                    echo "<form action='update.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $_GET['id'] . "'>";
                    echo "Name: <input type='text' name='pname' value='" . $row['pname'] . "'><br>";
                    echo "Company: <input type='text' name='company' value='" . $row['company'] . "'><br>";
                    echo "Year: <input type='text' name='year' value='" . $row['year'] . "'><br>";
                    echo "Band: <input type='text' name='band' value='" . $row['band'] . "'><br>";
                    echo "<input type='submit' value='Cập nhật'>";
                    echo "</form>";
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

</body>
</html>
