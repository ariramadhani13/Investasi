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
<link rel="stylesheet" type="text/css" href="css/AdminStyle.css" />
<script type="text/javascript" src="../Javascript/jquery-1.7.1.min.js"></script>
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
    	<div>
    		<h4 class="header"> Menu</h4>
        </div>
    	<ul>
        	<li><a href="donasi.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Donasi</a></li>
            <li><a href="#.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Tambah Donasi</a></li>        
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header">Daftar Donasi</h2>
        <table width="650" border="0" cellpadding="1" cellspacing="0">
        <tr bgcolor="">
        	<th class="table">Nama</th><th class="table">Alamat</th><th class="table">Jlh.Donasi</th><th class="table">Aksi</th>
        </tr>
        <?php 
		//pagination
		$line =0;
		error_reporting(E_ERROR);
		$line = 0;
		$page = 'Feedbacks.php';
		$dataperpage = mysql_query("SELECT * FROM tblfeedback");
		$numpage = mysql_num_rows($dataperpage);
		$start = $_GET['start'];
		$eu = $start - 0;
		$limit = 10;
		$thisp= $eu + $limit;
		$back = $eu - $limit;
		$next = $eu + $limit;
		if(strlen($start) > 0 && !is_numeric($start)){
			echo 'Data Error';	
			exit();
		}			
		//Get all data from the table
		$feedbacks = mysql_query("SELECT * FROM tblfeedback LIMIT $eu,$limit");
		while($row = mysql_fetch_array($feedbacks)){
			if($row['status']==1){
				$fontcolor = '#FF3C3C';	
			}
			if($line == 1){
				$bgcolor = '#F5F5F5';
				$line=0;
			}else{
				$bgcolor = '#FFF';
				$line=1;
			}
		?>
        	<tr style="color:<?php echo $fontcolor ?>; background:<?php echo $bgcolor?>" align="center" height="30">
            	<td>
            		<?php echo $row['name']?>
            	</td>
                <td>
            		<?php echo $row['email']?>
            	</td>
                <td>
            		<?php echo $row['address']?>
            	</td>
                <td>
            		<?php echo substr($row['message'], 0,32)?>
            	</td>
                <td>
                	<a href="AdminReply.php?id=<?php echo $row['f_id']?>" class="link">REPLY</a>&nbsp;
                    <a href="AdminReply.php?id=<?php echo $row['f_id']?>" class="link">DELETE</a>
                </td>
            </tr>
        <?php
		}
		 

						if($numpage>$limit){
							echo "<table align=center><tr><td align=left>";
							if($back>=0){
								echo "<a href=$page?start=$back>PREV</a>";	
							}
							echo "</td><td align=center width=50>";
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
     <!--End Web Content-->
</div>
<!--End Container-->
<?php include '../footer.php';?>

<?php 	
}
?>