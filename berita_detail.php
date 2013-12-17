<?php
include 'connect.php';

$id=$_GET['id'];
 $select_kat="select * from kategori order by id_kat";
 $kat=mysql_query($select_kat);

 $select="select * from berita where id_berita=".mysql_real_escape_string($id)."";
 $query=mysql_query($select);
 while($row=mysql_fetch_array($query))
 {
 $counter=$row['counter'];
 //$tgl = tgl_indo($row['tanggal']);

 
  $data .='<h3><font color="#0033FF" style="font-weight:bold; ">'.$row['judul'].'</font></h3>
  			<h4 class="rincian"><small>Post By: <b>'.$row['user_id'].'</b>. Date: <b>'.$row['tanggal'].'</b>.  Count: <b>'.$counter.'</b> kali</small></h4>
			
			<img src="image/upload/'.$row['gambar'].'" class="foto-berita" vspace="5" hspace="5" align="left">
			<p>'.$row['isi'].'</p>';
 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $judul;?> | Berita</title>
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
        	
            
     		
            			<?php echo $data; 
									mysql_query("update berita set counter=$counter+1 where id_berita='$_GET[id]'"); //untuk menghitung berapa kali artikel dibaca
									?>
        	    	
            
        </div>
        
        <div class="kanan">
        	<h3 class="judul">Testimonial</h3>
        </div>
        
	</div><!--End Container-->
<?php include 'footer.php';?>