<?php
session_start();
include '../connect.php';
if(isset($_SESSION['user_id'])==0){
header("location:./loginpage.php");	
}else{

$id = $_POST['id'];
$txtjudul = mysql_real_escape_string($_POST['txtjudul']);
$txtdesc = mysql_real_escape_string($_POST['txtdesc']);
$path = $_FILES['txtimage']['name'];
if($path == ""){
	
	$update = mysql_query("UPDATE berita SET judul='".$txtjudul."',
					   isi='".$txtdesc."' WHERE id_berita = '".$id."'") 
					   or die ('An error occured '.mysql_error());	
}else{
			
				$txtimage = basename(mysql_real_escape_string($_FILES['txtimage']['name']));
				if(move_uploaded_file($_FILES['txtimage']['tmp_name'], 
						"../image/upload/".$_FILES['txtimage']['name'])){
					$sqlalbum = mysql_query("UPDATE berita SET judul='".$txtjudul."',
										   	isi='".$txtdesc."',
											gambar='".$txtimage."'
											WHERE id_berita = '".$id."'") or die 
											('An error occured whileprocessing the form ' . mysql_error());	
					$status = 'Success';
				}else{
					$status = 'Failed: Something went wrong';	
				}
				echo returnStatus($status);	
			}
	}else{
		echo 'Invalid image format';	
	}
	function returnStatus($status)
				{
					return "<html><body>
					<script type='text/javascript'>
						function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}
						window.onload=init;
					</script></body></html>";
				}
}
}
?>