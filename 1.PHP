<?php
session_start();
header("Cache-control: private");
ob_start();
include ('settings.php');
include ('App/sver.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$dfconfig['web_title'];?> - ROW VALHALLA</title>
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
 			<? include ('App/includes/banner.php'); ?>
    <div class="new_item_container">
      <div class="right_top">Latest Item</div>
      	<div class="right_center_colum">
            <div class="latest_item_container">
                    <? include ('App/includes/top_item.php'); ?>
            </div>
    	</div>
 	</div>
<?
$_GET[view] = anti_injection($_GET[view]);
$_GET[view] = stripslashes($_GET[view]);
if (preg_match('/[^0-9]/', $_GET[view]))
{
$_GET[view] = "";
}
$get_news = mssql_query("SELECT * FROM news where id = '$_GET[view]'");
while ($news = mssql_fetch_array($get_news)) {
?>
    <div class="news_container">
    <div class="right_top"><?=$news[title]?></div>
    <div class="right_center_colum">
      <div class="news_view">
      <?
$myFile = "text/$news[0].txt";
$fh = fopen($myFile, 'r');
$theData = fgets($fh);
fclose($fh);
$txt = base64_decode($theData);
echo stripslashes($txt);
?>
      </div>
    </div>
    </div>
<?
}
?>
            <div class="news_container">
                <div class="right_top">News</div>
                    <div class="right_center_colum">
                            <? include ('App/includes/top_news.php'); ?>
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
