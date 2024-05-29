<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    #Xử lý dữ liệu form tại đây
    #Gán giá trị mới cho action
    $newAction = "";
}else{
    #Giá trị action ban đầu
    $newAction = "displayProductByYearandCompany";
}

?>

<form method="post" action="<?php echo $newAction; ?>" >

<div class="mb-3">
    <label for="" class="form-label">Select Year</label>
    <select
        class="form-select form-select-lg"
        name="selectYear"
        id=""
    >
        <option selected>Select one</option>
        <?php
            for ($i = 2015; $i < 2031; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
    </select>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="" />
        <label class="form-check-label" for="">  </label>
    </div>
    
</div>
<div class="mb-3">
    <label for="" class="form-label">Select Company</label>
    <select
        class="form-select form-select-lg"
        name="selectCompany"
        id=""
    >
        <option selected>Select one</option>
        <option value="Zermat Internacional">Zermat Internacional</option>
        <option value="ConRx Cold">ConRx Cold</option>
        <option value="Cardinal Health">Cardinal Health</option>
        <option value="Allergy Laboratories, Inc.">	Allergy Laboratories, Inc.</option>
        <option value="Rebel Distributors Corp">Rebel Distributors Corp</option>
    </select>
</div>
<div class="form-check">
        <input class="form-check-input" type="checkbox" value="0" id="" />
        <label class="form-check-label" for="">  </label>
    </div>

        <button
            type="submit"
            class="btn btn-primary"
            name="btSearch"
        >
            Submit
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
            echo "<td class= \"text-left\">". $row["id"] ."</td>";
            echo "<td class= \"text-left\">". $row["pid"] ."</td>";
            echo "<td class= \"text-left\">". $row["pname"] ."</td>";
            echo "<td class= \"text-left\">". $row["company"] ."</td>";
            echo "<td class= \"text-left\">". $row["year"] ."</td>";
            echo "<td class= \"text-left\">". $row["brand"] ."</td>";
            echo "<td class= \"text-left\">". '<img src="' . $row["pimage"] . '" alt="Image">' . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
}
 ?>

