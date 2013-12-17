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
<title><?php echo $judul;?> | Administrator Page</title>
<link rel="stylesheet" type="text/css" href="./css/AdminStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../Javascript/formvalidatealbum.js"></script>
</head>

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
<?php include 'menu.php';?>
<!--End Menu-->
<div class="header_under"></div>
<!--Start Container for the web content-->
<div class="container_wrapper">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<h4 class="header"> Menu</h4>
    	<ul>
        	<li><a href="#"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Berita</a></li>
            <li><a href="#"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Tambah Berita</a></li> 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Semua Berita</h2>	
        	<div class="form">
            	<table width="650" border="0" cellpadding="1" cellspacing="0" bgcolor="">
                	<tr>
                    	<th class="table">No</th><th class="table">Judul</th><th class="table">Waktu</th><th class="table">Penulis</th><th class="table">Image</th><th class="table">Action</th>
                    </tr>
                    <?php
						error_reporting(E_ERROR);
						$line = 0;
						$page = 'berita.php';
						$dataperpage = mysql_query("SELECT * FROM berita");
						$numpage = mysql_num_rows($dataperpage);
						$start = $_GET['start'];
						$eu = $start - 0;
						$limit = 12;
						$thisp= $eu + $limit;
						$back = $eu - $limit;
						$next = $eu + $limit;
						if(strlen($start) > 0 && !is_numeric($start)){
							echo 'Data Error';	
							exit();
						}
						$sql = mysql_query("SELECT * from berita ORDER BY id_berita ASC LIMIT $eu, $limit");
						while($rowCat = mysql_fetch_array($sql)){
						if($line == 1){
							$bgcolor='#E0EEF8';
							$line=0;
						}else{
							$bgcolor = '#FFFFFF';
							$line=1;
						}
					?>
                    <tr align="center" bgcolor="<?php echo $bgcolor?>">
                    	<td align="center" width="20"><?php echo $rowCat['id_berita'] ?></td>                    
                        <td align="center"><?php echo $rowCat['judul'] ?></td>
                        <td align="center"><?php echo $rowCat['tanggal'] ?></td>
                        <td align="center"><?php echo $rowCat['user_id'] ?></td>
                        <td align="center" width="60"><?php echo "<img src=../image/upload/$rowCat[gambar] width=50 height=40"?></td>
                        <td align="center" width="220">
                        
                        <a href="edit_berita.php?id=<?php echo $rowCat['id_berita']?>" class="link">Edit</a>&nbsp;|&nbsp;
                        <a href="AdminDeleteAlbum.php?id=<?php echo $rowCat['id_berita']?>" class="link" onclick="return confirm('Do you want to delete this?');">Delete</a></td>
                    </tr>
                    
                    <?php
						}

						if($numpage>$limit){
							echo "<table align=center><tr><td align=left width=60>";
							if($back>=0){
								echo "<a href=$page?start=$back>PREV</a>";	
							}
							echo "</td><td align=center>";
								$l = 1;
								for($i = 0; $i < $numpage;$i = $i + $limit){
									if($i<>$eu){
										echo "<a href=$page?start=$i><font color=red>$l</font></a>";	
									}else{
										echo "<font color=red>$l</font>";	
									}
									$l = $l + 1;
								}
							echo "</td><td align=right>";
							if($thisp<$numpage){
								echo "<a href=$page?start=$next>NEXT</a>";	
							}
							echo "</td></tr></table>";
						}
					?>
                </table>
            </div>
    </div>
     <!--End Web Content-->
</div>
<!--End Container-->
<?php include '../footer.php';?>

<?php  }?>
