<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$nohp = $_POST['trNohp'];
	$rekening = $_POST['trRekening'];
	$resi = $_POST['trResi'];

	$sql = "INSERT INTO transaksi (nohp, rekening, resi) VALUES ('$nohp', '$rekening','$resi')";
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