<?php
if(isset($_POST['query'])){

$parts = explode("/", $_POST['query']);

print base64_encode(str_replace('/','',$_POST['query'])).'!@#$%*'.$parts[1].'!@#$%*'.$parts[3];

}

if(isset($_POST['table']) && isset($_POST['id'])){
$mysync=new Sync($myconnection);
$mysync->connection=($myconnection);
$mysync->table=$_POST['table'];
$mysync->id=$_POST['id'];
$mysync->sync_status_to_true();
}

?>
