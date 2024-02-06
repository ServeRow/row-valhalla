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
<title><?=$dfconfig['web_title'];?> - Launcher </title>
<link href='themes/images/favico.png' rel='shortcut icon' type='logo.png'/>
<link href="themes/css/main.css" rel="stylesheet" type="text/css" />
<? include ('App/includes/js.php'); ?>
</head>

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
                            <? include ('App/includes/top_news.php'); ?> 