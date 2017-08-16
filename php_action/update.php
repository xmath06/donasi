<?php 

require_once 'db_connect.php';
$result=array();
$sql = "SELECT t.nohp,b.nama FROM transaksi as t LEFT JOIN baitullah as b ON t.rekening=b.rekening";
$query = $connect->query($sql);
while($row = $query->fetch_assoc()){
	$result[]=$row;
};

// database connection close
$connect->close();

echo json_encode($result);