<?php
session_start();
header("Cache-control: private");
ob_start();
include ('settings.php');
include ('App/sver.php');

$_GET[section] = 2;


$_GET[ctg] = anti_injection($_GET[ctg]);
if (preg_match('/[^0-9]/', $_GET[ctg]))
{
$_GET[ctg] = "";
}

$_GET[search] = anti_injection($_GET[search]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$dfconfig['web_title'];?> -  VPoints Shop</title>
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
          		<div class="cw_top">Search</div>
			<div class="cw_body">
                  <form action="v-shop.php?" >
                    <input name="search" type="text" class="search_input" value="Search..." /><input name="" type="submit" class="search_btn" value="Search"  />
                      </form>
              <div class="clear"></div>
			  </div>
          </div>

          <div class="top_rank_container">
            	<div class="left_labelbox">Categories</div>


                   <script type="text/javascript">
$(document).ready(function() {
$(".not li").hover(function(){
		$('.not li').not(this).stop().animate({ opacity: 0.30 }, 400);
		},function(){
		$('.not li').not(this).stop().animate({ opacity: 1 }, 400);
		});
			});
Cufon.replace('.not li a',{
textShadow: 'black 1px 1px',
hover: 'true'
});
</script>
<div class="ctg_container">
<ul class="not">
<?
$get_ctg = mssql_query("SELECT * FROM shop_ctg");
while ($ctg = mssql_fetch_array($get_ctg)) {
echo "<li><a href='v-shop.php?ctg=$ctg[0]&search=$_GET[search]'>$ctg[1]</a></li>";
}
?>
</ul>
</div>




  		  </div>



  </div>
          <div class="facebook">
            <? include ('App/includes/fb.php'); ?>
          </div>
  </div>
  <div class="rigth_container">

    <div class="new2_item_container">
      <div class="right_top">Vote Items</div>
      	<div class="right_center_colum">
            <div class="latest_item_container">







              <div class="locations">
                    <?

$get_ctg = mssql_query("SELECT * FROM shop_ctg");
while ($lctg = mssql_fetch_array($get_ctg)) {
	if ($_GET[ctg]=="$lctg[id]")
	{
		$ctg = "&#155&#155 $lctg[1]";
	}
}
if ($_GET[search]!=NULL)
{
	$sea = "&#155&#155 Search : $_GET[search] (<a href = 'v-shop.php?ctg=$_GET[ctg]&search='>Clear Search</a>)";
}
if ($_GET[section]==1)
{
$sec = "&#155&#155 Premium-Items";
}
else if ($_GET[section]==2)
{
	$sec = "&#155&#155 V-Items";
}
else if ($_GET[section]==3)
{
	$sec = "&#155&#155 Reborn-Items";
}
else
{
	$sec = "&#155&#155 All Items";
}
echo "<a href='v-shop.php?section=&ctg=&search='><w_10_unb>$sec</w_10_unb></a> <w_10_unb>$ctg</w_10_unb> <red_10_unb>$sea</red_10_unb>";
?>

              </div>



              <script type='text/javascript'>
function notEmpty(){
$.jGrowl("<b><u>Buy failed</u></b><br>Login First before you buy<br> Buy Denied!", {
					theme:  "error",
					speed:  "fast",
				});
}
</script>

     <?
if ($_GET[section]!=1 && $_GET[section]!=2 && $_GET[section]!=3)
{
	$_GET[section] = "";
}
				$vctg = stripslashes($_GET[ctg]);
				if (preg_match('/[^0-9]/', $vctg))
				{

				$_GET[ctg]= "";

				}
				else
				{
$get_ctg = mssql_query("SELECT * FROM shop_ctg");
while ($ctg = mssql_fetch_array($get_ctg)) {
	if ($_GET[ctg]==$ctg[0])
	{
	$_GET[ctg]= "$ctg[0]";
	}
}

				}

if ($_GET[ctg]!=NULL)
{
	$ctg = "and ItemCtg = '$_GET[ctg]'";
}

if ($_GET[search]!=NULL)
{
$gsearch = htmlspecialchars("$_GET[search]", ENT_QUOTES);
$gsearch = stripslashes($gsearch);
	$search = "and ItemName LIKE '%$gsearch%'";
}
$itemsql = "SELECT * FROM ROWpanel.dbo.ShopItemMap where ItemSec = '$_GET[section]' $ctg $search order by date desc";
$shopsql = "$itemsql";
$shopsqlQuery = mssql_query($shopsql) or die ("Error Query [".$shopsql."]");
$Num_Rows = mssql_num_rows($shopsqlQuery);

$Per_Page = $dfconfig['shop_per_page'] ;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
$Page_End = $Per_Page * $Page;
IF ($Page_End > $Num_Rows)
{
	$Page_End = $Num_Rows;
}


for($i=$Page_Start;$i<$Page_End;$i++)
{
$id=mssql_result($shopsqlQuery,$i,"ItemMain");
$get_new_item = mssql_query("SELECT  * FROM $dfsql[db3].dbo.ShopItemMap where ItemMain = '$id'");
while ($new_items = mssql_fetch_array($get_new_item)) {
$get_news = mssql_query("SELECT * FROM shop_ctg");
while ($news = mssql_fetch_array($get_news)) {
if ($new_items[ItemCtg]==$news[0]){$ctg = "$news[1]";}
}

if ($new_items[ItemSec]==1)
{
	$price = $points_name;
}
if ($new_items[ItemSec]==2)
{
	$price = "V-Points";
}
if ($new_items[ItemSec]==3)
{
	$price = "RB-Points";
}
?>





                     <div class="new_item_box">
    <div class="item_img widescreen" >
      <?
$filename = "themes/images/Items/$new_items[ItemSS]";
if (file_exists($filename)) {
    ?>
<a href="themes/images/items/<?=$new_items[ItemSS];?>" rel="superbox[image]"><img src="./themes/images/items/<?=$new_items[ItemSS];?>"/></a>
    <?
} else {
   ?>
         <a href="themes/images/items/default.jpg" rel="superbox[image]"><img src="themes/images/items/default.jpg"/></a>
<?
}
?>
    </div>
    <div class="item_detail">
      <div class="item_name">
      <a rel="tooltip" content="<?=$new_items[ItemName];?>">
    <?
	$scount = strlen($new_items[ItemName]);
	if ($scount>16)
		{
		echo substr("$new_items[ItemName]", 0, 16).'..';
		}
	else
		{
		echo $new_items[ItemName];
		}
	?>
    </a>
      </div>
      <div class="item_price"><?=$price;?>: <?=$new_items[ItemPrice];?></div>
      <div class="item_limit-stock">
                  Limit: <?=$new_items[Itemexp];?><Br />
                  Stock: <?=$new_items[Itemstock];?>
      </div>
                 <? if ($_SESSION["___user_"]==NULL && $_SESSION["___pass_"]==NULL)
			   {
				?>
      		<input name="" type="button" value="Buy" class="buy_btn" onclick="notEmpty()" />
             <?
			   }
			   else
			   {
			   ?>

              <a href="App/user/buy.php?buy=<?=$new_items[0];?>" rel="superbox[iframe.wikipedia][300x150]"> <input name="" type="button" value="Buy" class="buy_btn" /></a>

                <?
			   }
			   ?>
    </div>
</div>








  <?
}
}
	if($Num_Rows==0)
	{
	?>
    <div class="l_label">
  	<div class="l_label_rbg">
<div class="pager_container">
<table width="100%">
  <tr>
    <td align="center">
		<b>No item Found</b>
      </td>
  </tr>
</table>
</div>
    </div>
  </div>
    <?
	}
?>



















     <div class="clear"></div>














     <div class="shoppager_container">
      <table width="100%">
  <tr>
    <td width="32%">
    <g3>
      <?
	if ($_GET[Page]=="")
	{
		?>

        Page 1 - <?=$Num_Pages;?>

        <?
	}
	else
	{
	?>

    Page <?= $_GET[Page];?> - <?=$Num_Pages;?>

    <?
	}
	?>
    </g3>
    </td>

    <td width="0%"></td>
    <td width="33%" align="center">

   <g2>

   <?
if($Prev_Page)
{
echo "<a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&section=$_GET[section]&ctg=$_GET[ctg]&search=$_GET[search]'>&#171; Previews</a>";
}
else
{
echo "&#171; Previews";
}
echo " | ";
if($Page!=$Num_Pages)
{
echo "<a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&section=$_GET[section]&ctg=$_GET[ctg]&search=$_GET[search]''>Next &#187;</a>";
}
else
{
echo "Next &#187;";
}
?>
    </g2>
    </td>
    <td width="35%" align="right">
      <form name="form" id="form">
        <select name="jumpMenu" id="jumpMenu">
        <option selected="selected">Page</option>
  <?
	for($i=1; $i<=$Num_Pages; $i++){

echo "<option value='v-shop.php?Page=$i'>$i</option>";

	}
	?>
        </select>
        <input type="button" name="go_button" id= "go_button" value="Go" onclick="MM_jumpMenuGo('jumpMenu','parent',0)" />
      </form>
      </td>
  </tr>
</table>
      </div>













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
