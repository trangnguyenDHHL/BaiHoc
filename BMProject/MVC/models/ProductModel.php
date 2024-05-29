<?php
class ProductModel extends DBManager {
    public function getRecords($tablename) {
        $qr = "SELECT * FROM $tablename";
        return mysqli_query($this->conn, $qr);

}
    public function getRecordsbyField($tblname, $field, $keyword){
        $sql="SELECT * FROM $tblname where $field='$keyword'";
        return mysqli_query($this->conn, $sql);
        
    }
    public function getRecordsbyView($vname, $field, $keyword){
        $sql="SELECT * FROM $vname where $field='$keyword'";
        return mysqli_query($this->conn, $sql);
        
    }

    public function getRecordsbyYAndC($tblname, $year, $company){
        $sql = "SELECT * FROM $tblname WHERE year = ? AND company = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $year, $company);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function insertProduct($id, $pname, $company, $year, $band, $pimage)
    {
        $result = false;
        $sql = "insert into tblProduct(pid, pname, company, year, band, pimage) values ('$id', '$pname', '$company', '$year', '$band', '$pimage')";
        if(mysqli_query($this->conn, $sql)){
            $result = true;
        }
        return json_decode($result);
    }
}
?>