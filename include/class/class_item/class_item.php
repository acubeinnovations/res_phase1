<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

Class item{
	var $connection ="";
	var $id  =  gINVALID;
	var $name ="";
	var $item_category_id="";
	var $rate ="";
	var $tax= "";
	var $status_id="";
	var $error = false;
    var $error_number=gINVALID;
    var $error_description=""; 


    function update(){
		
			if ( $this->id == "" || $this->id == gINVALID) {
			$strSQL = "INSERT INTO items(name,item_category_id,rate,tax,status_id) VALUES ('";
			$strSQL .= addslashes(trim($this->itemname)) ."','";
			$strSQL .= addslashes(trim($this->item_category_id)) . "','";
			$strSQL .= addslashes(trim($this->rate)) . "','";
			$strSQL .= addslashes(trim($this->tax)) . "','";
			$strSQL .= addslashes(trim($this->status_id)) . "')";
			$rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
			
          if ( mysql_affected_rows($this->connection) > 0 ) {
              $this->id = mysql_insert_id();
              return $this->id;
        		}else{
              $this->error_number = 3;
              $this->error_description="Can't insert Item ";
              return false;
         
         }	 		}

			elseif($this->id > 0 ) {
			$strSQL = "UPDATE items SET name = '".addslashes(trim($this->name))."',";
			$strSQL .= "status_id = '".addslashes(trim($this->item_category_id))."',";
			$strSQL .= "status_id = '".addslashes(trim($this->rate))."',";
			$strSQL .= "status_id = '".addslashes(trim($this->tax))."',";
		 	$strSQL .= "parent_id = '".addslashes(trim($this->status_id))."'";
			$strSQL .= " WHERE id = ".$this->id;
			$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                   return true;
           	     }else{
                $this->error_number = 3;
               $this->error_description="Can't update Item";
               return false;
           		 }
    			}
  	}
  	function get_details(){
	if($this->id >0){
		$strSQL = "SELECT id,name,item_category_id,rate,tax,status_id FROM items WHERE id = '".$this->id."'";
		$rsRES	= mysql_query($strSQL,$this->connection) or die(mysql_error().$strSQL);
		 if(mysql_num_rows($rsRES) > 0){
			$user 	= mysql_fetch_assoc($rsRES);
			$this->id 		= $user['id'];
			$this->name 	= $user['name'];
			$this->item_category_id= $user['item_category_id'];
			$this->rate= $user['rate'];
			$this->tax= $user['tax'];
			$this->status_id= $user['status_id'];
			return true;
		}else{
			return false;
		}			
	}else{
		return false;
	}
}

function get_list_array()
	{				
	$item_category = array();$i=0;
	$strSQL = "SELECT  id,name,item_category_id,rate,tax,status_id FROM items";
	$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
			if ( mysql_num_rows($rsRES) > 0 )
				 {
					while ( list ($id,$name,$status_id,$parent_id) = mysql_fetch_row($rsRES) ){
						$item_category[$i]["id"] =  $id;
						$item_category[$i]["name"] = $name;
						$item_category[$i]["item_category_id"] = $item_category_id;
						$item_category[$i]["rate"] = $rate;
						$item_category[$i]["tax"] = $tax;
						$item_category[$i]["status_id"] = $status_id;
						$i++;
           		 		}
            return $item_category;
       		}else{
			$this->error_number = 4;
			$this->error_description="Can't list item";
			return false;
    			}
			}
}
?>



