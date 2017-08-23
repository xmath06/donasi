<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM baitullah";
$query = $connect->query($sql);


while ($row = $query->fetch_assoc()) {
	$active = '';

	$actionButton = '
	<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  Action <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
	  <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['rekening'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	  <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['rekening'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		';

	$output['data'][] = array(
		$row['nama'],
		$row['alamat'],
		$row['rekening'],
		$row['type'],
		$row['lat'],
		$row['long'],
		$row['gambar'],
		$actionButton
		
	);

}

// database connection close
$connect->close();

echo json_encode($output);