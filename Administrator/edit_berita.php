<?php
session_start();
include '../connect.php';
if(isset($_SESSION['user_id'])==0){
header("location:./loginpage.php");	
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $judul;?>| Administrator Page</title>
<link rel="stylesheet" type="text/css" href="./css/AdminStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../Javascript/formValidateEditAlbum.js"></script>
</head>
<script type="text/javascript">
function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
		document.getElementById('status').innerHTML=status;
	}
}
window.onload=upload;
</script>
<body>
<div class="header_wrapper">
	<div class="login">
          <?php
				$today = date("F j, Y");
				echo '&nbsp;Today is '.$today;
				?>
            <ul>
            	
                <li><a href="logout.php">Admin Logout</a></li>
            </ul>
   	</div>
</div>
<!--Start Menu-->
<?php include 'menu.php'?>
<!--End Menu-->
<div class="header_under"></div>
<!--Start Container for the web content-->
<div class="container_wrapper">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<h4 class="header"> Menu</h4>
    	<ul>
        	<li><a href="AdminAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Album</a></li>
            <li><a href="AdminViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Edit Berita</h2>	
        	<div class="form">
            	<div class="error">Error Message</div>
                <div class="success"></div>
            	<form name="category" method="post" id="form" enctype="multipart/form-data" action="AdminUpdateBerita.php" target="uploadframe">
                    <div>
                     	<iframe src="" id="uploadframe" name="uploadframe" 
                     	style="width:0px; height:0px; border:0px;"></iframe>
                     	</div>
                	<div>
                    	
                    </div>
                    <?php 
						$id = $_REQUEST['id'];
						$getAlbum = mysql_query("SELECT * FROM berita WHERE id_berita = '".$id."'");
						while($rowAlbum = mysql_fetch_array($getAlbum)){
					?>
                	<div>
                    	<label for="Album">Judul</label>
                        <input type="text" name="txtjudul" id="txtjudul" placeholder="Judul Berita" value="<?php echo $rowAlbum['judul']?>" size="39"/>
                        <input type="hidden" value="<?php echo $rowAlbum['id']?>" name="id" id="id"/>
                    </div>
                    
                    <div>
                    	<label for="Description">Isi</label>
                        <textarea rows="8" cols="50" placeholder="Isi Berita" name="txtdesc" id="txtdesc"><?php echo $rowAlbum['isi']?></textarea>
                    </div>
                    <div>
                    	<label for="Image">Gambar</label>
                        <img src="../image/upload/<?php echo $rowAlbum['gambar'];?>" width="80" height="70">
                    </div>
                    <div>
                    	<label for="Image">Ganti Gambar</label>
                        <input type="file" name="txtimage" id="txtimage"/>
                    </div>
                    <div>
                    	<input type="submit" value="Update Berita" id="button1"/>
                        <input type="button" id="button2" onclick="window.location.href='berita.php'" value="Back" />
                    </div>
                 
                    <?php
						}
					?>
                       </form>
            </div>
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
<?php include '../footer.php';?>

<?php } ?>