<?php
//prevent execution direct call by browser
if(!defined('CHECK_INCLUDED')){
		exit();
}
if (isset($_POST['bill_date']) && trim($_POST['bill_date']) != ""){
	echo "selected";
	
}else{
	
	echo "not selected";
	

}
?>
