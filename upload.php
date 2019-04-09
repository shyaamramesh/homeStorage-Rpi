<?php
if(isset($_FILES['file'])) {
	$file = $_FILES['file'];
	
	//properties
	$f_name = $file['name'];
	$f_temp = $file['tmp_name'];
	$f_size = $file['size'];
	$f_err = $file['error'];
	
	//ext
	$f_ext = explode('.', $f_name);
	$f_ext = strtolower(end($f_ext));
	
	$allowed = array('txt', 'jpg', 'png'); //ALLOWED FILE TYPES
	
	if(in_array($f_ext, $allowed)) {
		if($f_err === 0) {
			if($f_size <= 2097152){
				$f_name_new = uniqid('', true) . '.' . $f_ext;
				$f_destination = '/var/www/html/uploads/' . $f_name_new; // FILE LOCATION
				
				if(move_uploaded_file($f_temp, $f_destination)){
					echo $f_destination;
					echo files places in /uploads
				}
			}
		}
	}
}





