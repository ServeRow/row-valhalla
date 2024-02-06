<?php
session_start();
header("Cache-control: private");
ob_start();
include ('settings.php');
include ('App/sver.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$dfconfig['web_title'];?> - Premium Items</title>
<link href='themes/images/favico.png' rel='shortcut icon' type='logo.png'/>
<link href="themes/css/main.css" rel="stylesheet" type="text/css" />
<? include ('App/includes/js.php'); ?>
</head>

<body onload="load()">
<? include ('App/includes/wc_verify.php'); ?>
<div class="header">
  <div class="header_container">
        <div class="logo_container">  
       	 	<img src="themes/images/logo.png"/>
        </div>
        <div class="server_status_container">
        		 </div>
				<? include ('App/includes/member.php'); ?>
  </div>
      <div class="menu_container">
    		<? include ('App/includes/menu.php'); ?>
      </div>
</div>
<div class="container">
  <div class="center_container">
  <div class="left_container">
 	 <div class="left_bg">
  		  <div class="cw_container">
          		<div class="cw_top">Club War Winners</div>
          				<? include ('App/includes/club_war.php'); ?>
          </div>
          <div class="top_rank_container">
            	<div class="left_labelbox">Top 10 Players</div>
            			<? include ('App/includes/top_rank.php'); ?>
  		  </div>
  </div>
          <div class="facebook">
            <? include ('App/includes/fb.php'); ?>
          </div>
  </div>
  <div class="rigth_container">    
    

<div class="news_container">
                <div class="right_top">Donate to RYL Points</div>
                    <div class="right_center_colum">
                 <? if ($_SESSION["___user_"]==NULL && $_SESSION["___pass_"]==NULL)
			   {
				?>
      		<CENTER><font color=red size=10>Please LOG in</font></CENTER>
             <?
			   }
 else
			   {
			   ?>
               
              <iframe src="https://api.paymentwall.com/api/ps/?key=5d4c4d78df0b2da8d3df02a1b8466ea5&uid=<?php echo $_SESSION[___user_]; ?>&widget=p10_1" width="750" height="800" frameborder="0"></iframe>
               
                <?
			   }
			   ?> 
                </div>
            </div>
            <div class="new2_item_container">
      	<div class="right_center_colum">
            <div class="latest_item_container">  
            </div>
    	</div>
 	</div>
       
  </div>
  <div class="clear"></div>
</div>


</div>
<div class="bottom_page">
<?=$cfg['footer']?>
</div>
<? include ('App/includes/taskbar.php'); ?> 
</body>
</html>
