<?php
include 'connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $judul;?></title>
<link rel="stylesheet"  type="text/css" href="CSS/index.css" />
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.error').delay(1200).fadeOut('normal');
	$('.success').delay(1200).fadeOut('normal');	
});
</script>
<script type="text/javascript">

function slideSwitch() {
    var $active = $('#slideshow DIV.active');

    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');

    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');

    // uncomment below to pull the divs randomly
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<!--CSS Style-->
<style type="text/css">
#slideshow {
    position:relative;
    height:272px;
}

#slideshow DIV {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
    height: 272px;
    background-color: #FFF;
}

#slideshow DIV.active {
    z-index:10;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:9;
}

#slideshow DIV IMG {
    height: 272px;
	width:630px;
    display: block;
    border: 0;
    margin-bottom: 10px;
}

.news_content ul{ padding:0px; margin:0px;}
.news_content ul li{
	padding-top:10px;
	padding-left:5px;
	list-style:none; 
	font-size:11px;
}
.news_content ul li a{
	text-decoration:none;
	color:#7E7E7E;
	font-family:Georgia, "Times New Roman", Times, serif;
}
.news_content ul li a:hover{
	text-decoration:underline;
	color:#09F;
}
#table{
	color:#7E7E7E;
	font-family:Georgia, "Times New Roman", Times, serif; font-size:11px;}

#apDiv1 {
	position:absolute;
	width:630px;
	height:272px;
	z-index:1;
	border:1px solid #FFF;
	left: 31px;
	top: 23px;
}
</style>
</head>

<body>

<!--Start Menu-->
<?php include 'menu.php';?>
<!--End Menu-->
<div class="header_under"></div>
<div class="container_wrapper"><!--Start Container for the web content-->
    <div class="home_content"> <!--Start Web Content-->
        <div class="banner">
        	<!--Banner place-->
          <div id="apDiv1">
          
         	<div id="slideshow">
   				 <div class="active">
      			  <img src="image/1.jpg" alt="Slideshow Image 1" />
        			
   				 </div>
    
  				  <div>
      				 <img src="image/2.png" alt="Slideshow Image 2" />
      				 
   				 </div>
    
   				 <div>
      				 <img src="image/3.png" alt="Slideshow Image 3" />
      			
   				 </div>
    
    			<div>
       				 <img src="image/4.png" alt="Slideshow Image 4" />
       				 
   				 </div>
    
			</div>

          
          
          </div>
        </div>
        <div class="vote_container"> 
        	<form id="vote" name="vote" method="post"  action="vote.php">
            	<div class="header_vote"> 
                	<div id="header_vote_title">Survey</div>
                    <div id="message">Bagaimana menurut anda website ini??<a href="#" id="link">See Statistic here!</a></div>  
                    <br />
                    <?php
					//require_once('Administrator/PHP/connect.php');
					$getVote = mysql_query("SELECT * FROM tblvotes");
					while($row = mysql_fetch_array($getVote)){
					?>
    				<input type="radio" name="id" value="<?php echo $row['vid'] ?>"/>&nbsp;<label><?php echo $row['vname']?></label><br />
                    <?php } ?>
					<input type="submit" value="Vote" id="vote" name="vote"/>
                    <?php
                    if(isset($_GET['error'])==1){
                    ?> 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <div class="error">Wait after 24 hours</div> 
                    <?php 
					} 
					if(isset($_GET['success'])==1){
					?>       
                     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                      <div class="success">Thank you</div> 
                    <?php } ?>
                </div>
            </form>
        </div>
    </div> <!--End Web Content-->    
<div class="img_container"><!--Start image container-->
			
       <div id="class_col1">
          <img src="image/1.jpg" height="165" width="216" id="img"/>
       </div>
       <div id="class_col2"><img src="image/2.png" height="165" width="216" id="img"/></div>
       <div id="class_col3"><img src="image/3.png" height="165" width="216" id="img"/></div>
       <div id="class_col4"><img src="image/4.png" height="165" width="216" id="img"/></div>
    </div><!--End image containers-->
<div class="col1"><!--Start Bottom web content-->
   	 <div class="header">
    		<div id="header_title">Testimonial</div>
            <div class="album_holder">
            	<div class="content_holder">
                	<div class="content">
                    <b>Nama</b>: <i>Isi testimonial...</i>
                	</div>
                </div>
            </div>
        </div>
    </div>
   	 <div class="col2">
    	<div class="header">
    		<div id="header_title">Berita </div>
            <div class="news_content">
                    <ul>
                    		<?php
                           		$select = mysql_query("select * from berita order by id_berita DESC limit 0,10");
								while($r=mysql_fetch_array($select))
        	                        {					
                                		echo '<li><a href="berita_detail.php?id='."$r[id_berita]".'"> ' .$r['judul'].' </a></li>';
									}
							?>
                    </ul>
                </div>
        </div>
     
    	</div>
    	<div class="col3">
    	<div class="header">
    		<div id="header_title">Mitra Kami</div>
            
            <div class="album_holder">
            	<div class="content_holder">
                	<div class="content">
                		<img src="image/bamboo.jpg" height=50 width=60>	<div class="left"><!--Start music information container-->
                        
						<label id=title> Nama Mitra</label><br/>
						
                    </div><!--ENd music information container-->

                    </div>
                </div><!--End content holder-->
            </div><!--End album holder-->
            </div><!--End header-->           
    	</div><!--End col3-->
    </div><!--End col2-->
  </div><!--End Bottom web content--> 
</div><!--End Container-->
<?php include 'footer.php';?>