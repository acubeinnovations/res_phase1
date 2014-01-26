<?php
/* backup the db OR just a table */
function backup_tables($tables = '*')
{
//$con = mysql_connect($host,$user,$pass);
//mysql_select_db($name,$con);

//get all of the tables
if($tables == '*')
{
$tables = array('bills','bill_items','items','packing','item_categories','counter_items');
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
$count_result=mysql_query('SELECT COUNT(*) FROM '.$table.' WHERE sync='.SYNC_FALSE);
$num=mysql_fetch_array($count_result);
$count=$num[0];
if($count>0){
if($table_count>0){
$return.= "!@#$%*";
}
$result = mysql_query('SELECT * FROM '.$table.' WHERE sync='.SYNC_FALSE);
$num_fields = mysql_num_fields($result);

$row_count_index=0;
while($row = mysql_fetch_row($result))
{
$return.= 'INSERT INTO /'.$table.'/ VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
$row[$j] = preg_replace("#n#","n",$row[$j]);
if (isset($row[$j])) { if($j==0){$return.= '"/'.$row[$j].'/"' ;}else{$return.= '"'.$row[$j].'"' ; } } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$row_count_index++;

if($table_count<count($tables)-1){
if($row_count_index<$count){
$return.= ");!@#$%*";
}else{
$return.= ");";
}
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
}
print $return;
//save file
/*
$handle = fopen(ROOT_PATH.'files/DB/site-backup-restaurant/db-backup-'.date('Y-m-d H:i:s').'-'.(md5(implode(',',$tables))).'.txt','w+');
fwrite($handle,$return);
fclose($handle);
*/

}




?>
