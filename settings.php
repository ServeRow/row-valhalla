

<?
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
if (eregi("settings.php", $_SERVER[SCRIPT_NAME])) { die (include("404.php")); }

$ip = "127.0.0.1";

$weburl = "http://www.adventureofwar.com";

$gamename = "ADVENTURE OF WAR";

$channel = "Channel 1";

$channel_online = "Online";

$server_online = "Online";

$dfsql[dbaddress] = "DANIELRYL";		//DB HOST

$dfsql[dbuser] = "sa";		//DB ID

$dfsql[dbpass] = "Daniel0010@";		//DB PASS

$dfsql[db1] = "ROWpanel"; // DB Name

$dfsql[db2] = "ROWgame"; // DB rangame1

$dfsql[db3] = "ROWpanel";	// DB SHop

$dfsql[db4] = "youxiuser";	//DB user

$dfsql[db5] = "ROWpay";	//DB Online

$welcome = "A new adventure awaits!"; // Welcome Text

$fb = "https://www.facebook.com/adventureofwar/"; // Welcome Text

$gt_name = "GameTime2";


$objConnect = mssql_connect("$dfsql[dbaddress]","$dfsql[dbuser]","$dfsql[dbpass]") or die("DDS ERROR");
$objDB = mssql_select_db("$dfsql[db1]");
include ("webset.php");



?>
