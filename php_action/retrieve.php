<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM baitullah";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';

	$actionButton = '
	<div class="btn-group">
	  <a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['rekening'].')"> <span class="glyphicon glyphicon-edit"></span> '.$row['rekening'].'</a>
	</div>
		';

	$output['data'][] = array(
		$actionButton,
		$row['nama'],
		$row['alamat']
		
	);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);