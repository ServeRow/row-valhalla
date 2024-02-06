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
<title><?=$dfconfig['web_title'];?> - Donations</title>
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
               <CENTER>
              <font color=red>
<form target="paypal" action="" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="7HRJS3N885UN4">
<table>
<tr><td><input type="hidden" name="on0" value="RYL Points">RYL Points</td></tr><tr><td><select name="os0">
	<option value="30">30 RYL POINTS 10,00 EUR</option>
	<option value="45">45 RYL POINTS 15,00 EUR</option>
	<option value="60">60 RYL POINTS 20,00 EUR</option>
	<option value="100">100 RYL POINTS 33,00 EUR</option>
	<option value="165">165 RYL POINTS 55,00 EUR</option>
</select> </td></tr>
<tr><td><input type="hidden" name="on1" value="E-Mail">E-Mail</td></tr><tr><td><input type="text" name="os1" maxlength="200"></td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input type="image" src="" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="" width="1" height="1">
</font>
</form>

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
