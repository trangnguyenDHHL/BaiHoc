<?php 
class ProductController extends Controller{
    public $productModel;
    public function __construct(){
        $this ->productModel = $this->model("ProductModel");

}
    function displayIntroduction(){
        $this->view("master", [
        "Page" => "home"
    ]);
}
    function getProductsbyBand(){
        $this->view("master", ["Page" => "getProductsbyBand"]);
}
    public function displayProductByBand(){
        if (isset($_POST["btSearch"])){
            $band = $_POST["selectBrand"];
            $tblname = 'tblproduct';
            $field ="band";
            $products = $this->productModel->getRecordsbyField($tblname, $field, $band);
            $this->view("master", ["Page" => "getProductsbyBand", "Products" => $products]);
        }
    }

    function getProductsbyYear(){
        $this->view("master", ["Page" => "getProductsbyYear"]);
}
    public function displayProductByYear(){
        if (isset($_POST["btSearch"])){
            $year = $_POST["selectYear"];
            $tblname = 'tblproduct';
            $field ="year";
            $products = $this->productModel->getRecordsbyField($tblname, $field, $year);
            $this->view("master", ["Page" => "getProductsbyYear", "Products" => $products]);
        }
    }

    function getProductsbyYearAndCompany(){
        $this->view("master", ["Page" => "getProductsbyYearAndCompany"]);
}
    public function displayProductByYearandCompany(){
        if (isset($_POST["btSearch"])){
            $year = $_POST["selectYear"];
            $company = $_POST["selectCompany"];
            $tblname = 'tblproduct';
            $products = $this->productModel->getRecordsbyYandC($tblname, $year, $company );
            $this->view("master", ["Page" => "getProductsbyYearAndCompany", "Products" => $products]);
        }
    }

    function getProductsbyCID(){
        $this->view("master", ["Page" => "getProductsbyCID"]);
}
    public function displayProductByCID(){
        if (isset($_POST["btSearch"])){
            $cid = $_POST["InputCID"];
            $vname = 'viewordercustomer';
            $field ="cid";
            $products = $this->productModel->getRecordsbyView($vname, $field, $cid);
            $this->view("master", ["Page" => "getProductsbyCID", "Products" => $products]);
        }
    }

    function impInsertProduct() 
        {
            $this -> view("master", [
                "Page" => "insertProduct"
            ]);
        }

        function insertProduct() {
            if (isset($_POST["btInsert"])) {
                $id = $_POST["id"];
                $pname = $_POST["pname"];
                $company = $_POST["company"];
                $selectband = $_POST["selectBand"];
                $year = $_POST["selectYear"];
                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    $img = 'data: image/png;base64,'
                    . base64_encode(file_get_contents($_FILES['img']["tmp_name"]));
                }

                $result = $this->productModel->insertProduct($id, $pname, $company, $year, $selectband, $img);
                $this->view(
                    "master",
                    [
                        "Page" => "insertProduct",
                        "result" => $result
                    ]
                );
            }
        }
}
?>