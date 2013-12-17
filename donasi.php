<?php
include 'connect.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $judul;?> | Donasi</title>
<link rel="stylesheet"  type="text/css" href="CSS/index2.css"/>
</head>

<body>

<!--Start Menu-->
<?php include 'menu.php';?>
<!--End Menu-->
<div class="header_under"></div>
	<!--Start Container for the web content-->
	<div class="content">
		<div class="kiri">
        	<div class="header_title">Daftar Donasi..</div>
			<table width="100%">
            	<tr>
                	<td width="10px">Nama</td>
                    <td width="10px">Alamat</td>
                    <td width="10px">Jlh. Donasi</td>
                </tr>
            </table>
        </div>
        
        <div class="kanan">
        	<h3 class="judul">Testimonial</h3>
        </div>
        
	</div><!--End Container-->
<?php include 'footer.php';?>