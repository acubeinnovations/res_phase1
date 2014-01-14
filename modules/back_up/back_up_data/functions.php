<?php
/* backup the db OR just a table */
function backup_tables($tables = '*')
{
//$con = mysql_connect($host,$user,$pass);
//mysql_select_db($name,$con);

//get all of the tables
if($tables == '*')
{
$tables = array('bills','bill_items');
/*
$result = mysql_query('SHOW TABLES');
while($row = mysql_fetch_row($result))
{
$tables[] = $row[0];
}
*/

}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}
$return = "";

//cycle through
$table_count=0;
foreach($tables as $table)
{
$count_result=mysql_query('SELECT COUNT(*) FROM '.$table.' WHERE sync=1');
$num=mysql_fetch_array($count_result);
$count=$num[0];
$result = mysql_query('SELECT * FROM '.$table.' WHERE sync=1');
$num_fields = mysql_num_fields($result);
/*
$return.= 'DROP TABLE IF EXISTS '.$table.';';
$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
$return.= $row2[1].";";
*/
$row_count_index=0;
while($row = mysql_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
$row[$j] = preg_replace("#n#","n",$row[$j]);
if (isset($row[$j])&&$j!=0) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$row_count_index++;

if($table_count<1){
$return.= ");!@#$%*";
}else{
if($row_count_index<$count){
$return.= ");!@#$%*";
}else{
$return.= ");";
}
}

}
$return.="";
$table_count++;
}
//print $return;
//save file

$handle = fopen(ROOT_PATH.'files/DB/site-backup-restaurant/db-backup-'.date('Y-m-d H:i:s').'-'.(md5(implode(',',$tables))).'.txt','w+');
fwrite($handle,$return);
fclose($handle);

}




?>
