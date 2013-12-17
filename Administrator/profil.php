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
        	<li><a href="profil.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Profil</a></li>
             
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Profil</h2>	
        	<div class="form">
            	<table width="650" border="0" cellpadding="1" cellspacing="0" bgcolor="">
                	<tr>
                    	<th class="table">No</th><th class="table">Isi</th><th class="table">Gambar</th><th class="table">Aksi</th>
                    </tr>
                    <?php
						error_reporting(E_ERROR);
						
						$sql = mysql_query("SELECT * from profil ");
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
                    	<td align="center" width="20"><?php echo $rowCat['id_prof'] ?></td>                    
                        <td align="center"><?php echo $rowCat['isi'] ?></td>
                        
                        <td align="center" width="60"><?php echo "<img src=../image/upload/$rowCat[gambar] width=50 height=40"?></td>
                        <td align="center" width="220">
                        
                        <a href="#" class="link">Edit</a>&nbsp;|&nbsp;
                        <a href="#" class="link" onclick="return confirm('Do you want to delete this?');">Delete</a></td>
                    </tr>
                    
                    <?php
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
