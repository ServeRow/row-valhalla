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
<title><?=$dfconfig['web_title'];?> - Game Rankings</title>
<link href='themes/images/favico.png' rel='shortcut icon' type='logo.png'/>
<link href="themes/css/main.css" rel="stylesheet" type="text/css" />
<? include ('App/includes/js.php'); ?>
<script type="text/javascript" src="themes/js/jsmenu2/cufon-yui.js"></script>
<script type="text/javascript" src="themes/js/jsmenu2/Myriad_Pro_400-Myriad_Pro_700-Myriad_Pro_italic_400-Myriad_Pro_italic_700.font.js"></script>
<link href="themes/css/rank.css" rel="stylesheet" type="text/css" />
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
          <div class="top_rank_container">
            	<div class="left_labelbox">Player Rankings</div>
            		
                    
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
  <li><a href="ranks.php?typ=5">Defender</a></li>
    <li><a href="ranks.php?typ=6">Warrior</a></li>
    <li><a href="ranks.php?typ=7">Assassin</a></li>
    <li><a href="ranks.php?typ=8">Archer</a></li>
    <li><a href="ranks.php?typ=9">Sorcerer</a></li>
    <li><a href="ranks.php?typ=10">Enchanter</a></li>
    <li><a href="ranks.php?typ=11">Priest</a></li>
    <li><a href="ranks.php?typ=12">Cleric</a></li>
    <li><a href="ranks.php?typ=20">Attacker</a></li>
    <li><a href="ranks.php?typ=19">Templar</a></li>
    <li><a href="ranks.php?typ=21">Gunner</a></li>
    <li><a href="ranks.php?typ=22">Rune Officator</a></li>
    <li><a href="ranks.php?typ=23">Life Officator</a></li>
    <li><a href="ranks.php?typ=24">Shadow Officator</a></li>
    <li><a href="ranks.php?typ=gold">Top Honour</a></li>
    <li><a href="ranks.php?typ=pk">Total Rankings</a></li>
</ul>
</div> 
                    
                    
                    
                    
  		  </div>
          
          <div class="top_rank_container">
            	<div class="left_labelbox">Guild Categories</div>
<div class="ctg_container">
<ul class="not">
	<li><a href="ranks.php?typ2=all">All Guilds</a></li>
    <li><a href="ranks.php?typ2=1">Kartefant Guild</a></li>
    <li><a href="ranks.php?typ2=2">Merkhadia Guild</a></li>
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
      <div class="right_top">
<?
   if ($_GET[typ2]==NULL)
   {
			if ($_GET[typ]=="5" || $_GET[typ]=="6" || $_GET[typ]=="7" || $_GET[typ]=="8" || $_GET[typ]=="9" || $_GET[typ]=="10" || $_GET[typ]=="11" || $_GET[typ]=="12" || $_GET[typ]=="20" || $_GET[typ]=="19" || $_GET[typ]=="21" ||  $_GET[typ]=="22" ||  $_GET[typ]=="23" ||  $_GET[typ]=="24" ||  $_GET[typ]=="pk" || $_GET[typ]=="gold"  || $_GET[typ]=="")
			{
			if ($_GET[typ]==5){$c="Defender";};	
			if ($_GET[typ]==1){$c="Fighter";};
			if ($_GET[typ]==2){$c="Rogue";};
			if ($_GET[typ]==4){$c="Mage";};
			if ($_GET[typ]==8){$c="Accolyte";};	
			if ($_GET[typ]==6){$c="Warrior";};	
			if ($_GET[typ]==7){$c="Assassin";};	
			if ($_GET[typ]==8){$c="Archer";};	
			if ($_GET[typ]==9){$c="Sorcerer";};	
			if ($_GET[typ]==10){$c="Enchanter";};	
			if ($_GET[typ]==11){$c="Priest";};	
			if ($_GET[typ]==12){$c="Cleric";};	
			if ($_GET[typ]==20){$c="Attacker";};
			if ($_GET[typ]==19){$c="Templar";};
			if ($_GET[typ]==21){$c="Gunner";};
			if ($_GET[typ]==22){$c="Rune Officator";};
			if ($_GET[typ]==23){$c="Shadow Officator";};
			if ($_GET[typ]==24){$c="Life Officator";};
			if ($_GET[typ]==gold){$c="Honour";};
			if ($_GET[typ]==pk){$c="Total Rankings";};
			if ($_GET[typ]=="5,6,7,8,9,10,11,12,20,19,21,22,23,24"){$c="ALL CLASS";};
			echo "$c";
			}
   }
   else
   {
			if ($_GET[typ2]=="0" || $_GET[typ2]=="1" || $_GET[typ2]=="2" || $_GET[typ2]=="all")
			{
			if ($_GET[typ2]==1){$g="Kartefant Guild";};		
			if ($_GET[typ2]==2){$g="Merkhadia Guild";};	
			if ($_GET[typ2]==all){$g="All Guilds";};	
			echo "$g";
			}      
   }
?>
      </div>
      	<div class="right_center_colum">
            <div class="latest_item_container">  
                    
<?
   if ($_GET[typ2]==NULL)
   {
   ?>  
                    
                                             <? 
if ($_GET[typ]=="5" || $_GET[typ]=="6" || $_GET[typ]=="7" || $_GET[typ]=="8" || $_GET[typ]=="9" || $_GET[typ]=="10" || $_GET[typ]=="11" || $_GET[typ]=="12" || $_GET[typ]=="20" || $_GET[typ]=="19" || $_GET[typ]=="21" ||  $_GET[typ]=="22" ||  $_GET[typ]=="23" ||  $_GET[typ]=="24" || $_GET[typ]=="")
{
$r = "SELECT TOP 30 * FROM $dfsql[db2].dbo.CharInfo WHERE class = $_GET[typ] ORDER BY Fame DESC, Level DESC";
}
else
{
$r = "SELECT TOP 30 * FROM $dfsql[db2].dbo.CharInfo WHERE class = $_GET[typ] ORDER BY Fame DESC, Level DESC";


}

if ($_GET[typ]=="gold")
{
$r = "SELECT TOP 30 * FROM $dfsql[db2].dbo.CharInfo ORDER BY Mileage DESC, Level DESC";
}
else if ($_GET[typ]=="pk")
{
$r = "SELECT TOP 30 * FROM $dfsql[db2].dbo.CharInfo ORDER BY Fame DESC, Mileage DESC";
}


$get_crank = mssql_query("$r");
while ($crank = mssql_fetch_array($get_crank)) 
{ 
$gccount++;
$get_g = mssql_query("SELECT * FROM $dfsql[db2].dbo.tblGuildInfo where tnNationType = '$crank[3]' ");
while ($guild = mssql_fetch_array($get_g)) { 
$g = $guild[3]; 
}
if ($crank['Class']=="5"){$class = "Defender";}
if ($crank['Class']=="6"){$class = "Warrior";}
if ($crank['Class']=="7"){$class = "Assassin";}
if ($crank['Class']=="8"){$class = "Archer";}
if ($crank['Class']=="9"){$class = "Sorcerer";}
if ($crank['Class']=="10"){$class = "Enchanter";}
if ($crank['Class']=="11"){$class = "Priest";}
if ($crank['Class']=="12"){$class = "Cleric";}
if ($crank['Class']=="20"){$class = "Attacker";}
if ($crank['Class']=="19"){$class = "Templar";}
if ($crank['Class']=="21"){$class = "Gunner";}
if ($crank['Class']=="22"){$class = "Rune";}
if ($crank['Class']=="23"){$class = "Life";}
if ($crank['Class']=="24"){$class = "Shadow";}

if ($crank['Donator']=="0"){$status = "False";}
if ($crank['Donator']=="24"){$status = "True";}



		
		
if ($crank[race]=="1"){$school = "Kartefant Guild";}
if ($crank[race]=="2"){$school = "Merkhadia Guild";}				
			?>


<div class="rank_item_box module">
    	<div class="rank_item_graybg">
          <div class="rankitem_img_container">        
            <div class="image_border"><img src="themes/images/class/<?=$class?>.png" width="57" height="53" /></div>
          </div>
          <div class="rankitem_detailbox">
          <div class="btn_buy">Top <?=$gccount;?></div>
          <div class="rankitem_details">Level:<?=$crank[Level];?></div>
          <div class="rankitem_details">Fame:<?=$crank[Fame];?></div>
          <div class="rankitem_details">Medal:<?=$crank[Mileage];?></div>
          </div>
          <div class="clear"></div>
          <div class="rank_itemprice"><?=$crank[Name]?></div>
          <div class="rank_itemdate">
          
          <?
		  if ($_GET[typ]==gold)
		  {
			  $cmoney = number_format($crank[Gold]);
			  echo "Class: $class<Br>";
		  }
		  else
		  {
		  ?>
          Class: <?=$class?><Br />
          <?
		  }
		  ?>
          
          Donator: <?=$status?><Br />
          Guild:
          <?
		  if ($g!=NULL)
				{
				echo "$g";
				}
				else
				{
				echo "None";
				}
		  ?>
          </div>
          
          
    	</div>
    </div>
    
    
    
<?
}

}
else
{
?>
<div class="clear"></div>

<?
if ($_GET[typ2]=="1" || $_GET[typ2]=="2" || $_GET[typ2]=="")
{
$r = "SELECT TOP 40 FROM $dfsql[db2].dbo.tblGuildInfo where tnNationType = $_GET[typ2] ORDER by nGuildFame DESC, tnGuildLevel, nGuildGold Desc";
}

else if ($_GET[typ2]=="all")
{
$r = "SELECT TOP 40 FROM $dfsql[db2].dbo.tblGuildInfo where tnNationType ORDER by nGuildFame DESC, tnGuildLevel, nGuildGold Desc";
}

$get_grank = mssql_query("$r");
while ($g = mssql_fetch_array($get_grank)) 
{ 
$gr++;

?>


<div class="rank_item_box2 module">
    	<div class="rank_item_graybg2">
          <div class="rankitem_img_container">        
            <div class="image_border"><img src="themes/images/school/<?=$cha[ChaSchool];?>.png" width="57" height="53" /></div>
          </div>
          <div class="rankitem_detailboxg">
          <div class="btn_buy">Top <?=$gr;?></div>
          <div class="rankitem_detailsg">Level:<?=$rank;?></div>
          <div class="rankitem_detailsg">Members<Br /><?=$g[4];?></div>
          </div>
          <div class="clear"></div>
          <div class="rank_itemprice"><?=$g[1];?></div>
          <div class="rank_itemdate">
          Leader: <?=$cha[ChaName];?><Br />
          </div>

          
    	</div>
    </div>


                 <?

		}
			?>
    












<?
}
?>



                    
        <div class="clear"></div>
        
        
        
        
        
        
        
        
        
        
        
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
