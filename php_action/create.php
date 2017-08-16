<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$rekening = $_POST['rekening'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];

	$sql = "INSERT INTO baitullah (rekening, nama, alamat) VALUES ('$rekening', '$nama', '$alamat')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}
	// close the database connection
	$connect->close();

	echo json_encode($validator);

}