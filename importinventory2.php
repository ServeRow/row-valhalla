<?php
$serverName="DANIELRYL";
$uid = '';
$pwd = "";
$dbase = "youxiuser";

$conninfro = array("Database"=>$dbase, "UID"=>$uid, "PWD"=>$pwd);

$con = sqlsrv_connect($serverName $conninfro);
if( $con === false){
    die( print_r( sqlsrv_errors(), true));
}
echo "Connected successfully";

$file = fopen("E:\Server\Release\Script\Game\ItemScript.txt","r");

$limit=10000;
$i=0;
$a=1;

if($file){

	sqlsrv_query($con,"TRUNCATE TABLE RYLitem");
	while(! feof($file))
	{

	   $file_rows= fgets($file,4096);
     if ($file_rows == 0) {
       continue;
     }
     $data=str_getcsv($file_rows,"\t");
	   //echo '<pre>'; print_r($data); echo '</pre>';
     $sql = "INSERT INTO RYLitem (id,ItemName,ItemProtoTypeId,Amount,Price,Description,category,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $params = array($a,$data[1],$data[0],999,$data[18],'test','test','test');

      $stmt = sqlsrv_query($con, $sql, $params);
      if( $stmt === false ) {
           die( print_r( sqlsrv_errors(), true));
      }

		 	$a++;

	$i++;

	}
}
fclose($file);?>
