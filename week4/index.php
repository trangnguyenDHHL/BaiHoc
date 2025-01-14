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

// Select Data
$sql = "SELECT id, name, description, price FROM products";
$result = $conn->query($sql);

// Insert Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
    $conn->query($sql);
}

// Delete Data
if(isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];
    $sql = "DELETE FROM products WHERE id = $delete_id";
    $conn->query($sql);
}

// Update Data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_id"])) {
    $id = $_POST["update_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id='$id'";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    <!-- Hiển thị dữ liệu từ bảng -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
  if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["price"]."</td>";
            echo "<td>".$row["description"]."</td>";
            echo "<td><a href='delete.php?id=".$row["id"]."'>Xóa</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu";
    }
        ?>
    </table>

    <!-- Biểu mẫu thêm sản phẩm mới -->
    <h2>Thêm sản phẩm mới</h2>
    <form action="" method="post">
        <p>Name: <input type="text" name="name"></p>
        <p>Description: <input type="text" name="description"></p>
        <p>Price: <input type="text" name="price"></p>
        <p><input type="submit" value="Thêm"></p>
    </form>
</body>
</html>