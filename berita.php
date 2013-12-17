<?php
include 'connect.php';
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
        	
            
     		<div class="content_holder"><!--Start content holder for the album-->
            			<?php
						// Langkah 1: Tentukan batas,cek halaman & posisi data
						$batas=5;
							if(isset($_GET['halaman'])){
								$halaman = $_GET['halaman'];
							  }
							  if(empty($halaman)){
							   $posisi  = 0;
							   $halaman = 1;
							  }
							  else{
							   $posisi = ($halaman-1) * $batas;
							  }
						//echo $data;
						
						//Langkah 2: Sesuaikan perintah SQL
	  $tampil = "SELECT * FROM berita LIMIT $posisi,$batas";
	  $hasil  = mysql_query($tampil);
	  $no = $posisi+1;
      while($row=mysql_fetch_array($hasil)){
						
				$judul = preg_replace("/\s/","-",$row['judul']);
    			$url_link = "berita".$row['id_berita']."-".$judul.".html";
						
						echo '<p><a href="'.$url_link.'"><h3 class="cap">' .$row['judul'].'</h3></a></p>
          <img src="image/upload/'."$row[gambar]".'" width="100px" height="78px" alt="an image" align="left" class="foto" vspace="2px" hspace="2px"/>'.substr("$row[isi]",0,450).' <a href="'.$url_link.'" class="more">[Read More]</a>
		   </p>
		   <hr color=#CCC noshade=noshade />
		   <div class="batas"></div>';
 }
 //Langkah 3: Hitung total data dan halaman 
	  $tampil2 = mysql_query("SELECT * FROM berita");
	  $jmldata = mysql_num_rows($tampil2);
	  $jmlhal  = ceil($jmldata/$batas);
	  //echo "<center>";
	  /*
	  echo "<div class=paging>";
	  
	  // Link ke halaman sebelumnya (previous)
	  
	  if($halaman > 1){
	   $prev=$halaman-1;
	   echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$prev><< Prev</a></span>";
	  }
	  else{ 
	   echo "<span class=disabled><< Prev</span>";
      }
		// Tampilkan link halaman 1,2,3 ...
	  for($i=1;$i<=$jmlhal;$i++)
	  if ($i != $halaman){
	    echo  "<a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a>";
      }else{
     	echo  "<span class=current>$i</span>";
	  }
      // Link kehalaman berikutnya (Next)
	  if($halaman < $jmlhal){
	    $next=$halaman+1;
	    echo "<span class=prevnext><a href=$_SERVER[PHP_SELF]?halaman=$next>Next>> </a></span>";
	  }else{ 
	    echo "<span class=disabled>Next>> </span>";
	  }
      echo "</div>";
	  */
	 // echo "</center>";				
				
				?>
        	    	
            </div><!--End content holder for the album-->
            
        </div>
        
        <div class="kanan">
        	<h3 class="judul">Testimonial</h3>
        </div>
        
	</div><!--End Container-->
<?php include 'footer.php';?>