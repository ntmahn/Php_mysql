<?php

header("Content-Type: application/json");
include("connect.inp");


$sql = "SELECT * FROM sanpham";
$result = $con->query($sql);

$danhsach = [];
if ($result && $result->num_rows > 0) {  
    while ($row = $result->fetch_assoc()) {
        $danhsach[] = $row;
    }
}

echo json_encode($danhsach);
$con->close();
?>
