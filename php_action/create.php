<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	
	//gambar
	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	$path = "images/pictures/".$nama_file;


	$validator = array('success' => false, 'messages' => array());

	$rekening = $_POST['rekening'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$type = $_POST['type'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];


	if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
		// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
		//if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
		  // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
		  // Proses upload
		  if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
			// Jika gambar berhasil diupload, Lakukan :  
			// Proses simpan ke Database
			$sql = "INSERT INTO baitullah (rekening, nama, alamat,lat,lng,gambar,tipe) VALUES ('$rekening', '$nama', '$alamat','$lat','$long','$path','$type')";
			$query = $connect->query($sql);
			if($query === TRUE) {			
				$validator['success'] = true;
				$validator['messages'] = "Berhasil menambahkan data";		
			} else {		
				$validator['success'] = false;
				$validator['messages'] = "Gagal menambahkan data";
			};
		//   }else{
		// 	$validator['success'] = false;
		// 	$validator['messages'] = "Gagal menyimpan gambar";
		  }
		}
		$validator['success'] = true;
		$validator['messages'] = $rekening.$nama.$alamat.$type.$lat.$long.$path;
	// close the database connection
	$connect->close();

	echo json_encode($validator);

}