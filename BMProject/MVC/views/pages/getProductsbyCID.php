<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    #Xử lý dữ liệu form tại đây
    #Gán giá trị mới cho action
    $newAction = "";
}else{
    #Giá trị action ban đầu
    $newAction = "displayProductByCID";
}

?>

<form method="post" action="<?php echo $newAction; ?>" >
<div class="mb-3">
    <label for="" class="form-label">CID</label>
    <input
        type="text"
        class="form-control"
        name="InputCID"
        id=""
        placeholder=""
    />
</div>


        <button
            type="submit"
            class="btn btn-primary"
            name="btSearch"
        >
            Search
        </button>
</form>
<?php
if (isset($data["Products"])){
    echo "<table>";
        echo "<tbody>";
        echo "<thead>";
        echo "<tr>";
        $fieldNames = $data["Products"]->fetch_fields();
        foreach ($fieldNames as $field) {
            echo "<th class = \"text-center\">" . strtoupper($field->name) ."</th>";
        }
        echo "</tr>";
        echo "</thead>";
        while ($row = mysqli_fetch_array($data["Products"])){
            echo "<tr>";
            echo "<td class= \"text-left\">". $row["cid"] ."</td>";
            echo "<td class= \"text-left\">". $row["cname"] ."</td>";
            echo "<td class= \"text-left\">". $row["address"] ."</td>";
            echo "<td class= \"text-left\">". $row["oid"] ."</td>";
            echo "<td class= \"text-left\">". $row["odate"] ."</td>";
            echo "<td class= \"text-left\">". $row["pid"] ."</td>";
            echo "<td class= \"text-left\">". $row["pname"] ."</td>";
            echo "<td class= \"text-left\">". $row["company"] ."</td>";
            echo "<td class= \"text-left\">". $row["quantity"] ."</td>";
            echo "<td class= \"text-left\">". $row["unti_price"] ."</td>";
            echo "<td class= \"text-left\">". $row["total"] ."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
}
 ?>

