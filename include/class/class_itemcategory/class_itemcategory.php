<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class ItemCategory{
	var $connection;
	var  $id=gINVALID;
	var  $name="";
	var  $status_id="";
	var  $parent_id="";
	var $error = false;
    var $error_number=gINVALID;
    var $error_description="";
	

	
	function update()
		{
			
		 
			if ( $this->id == "" || $this->id == gINVALID) {
			$strSQL = "INSERT INTO item_categories (name,status_id,parent_id) VALUES ('";
			$strSQL .= addslashes(trim($this->name)) ."','";
			$strSQL .= addslashes(trim($this->status_id)) . "','";
			$strSQL .= addslashes(trim($this->parent_id)) . "')";
			$rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );
			
          if ( mysql_affected_rows($this->connection) > 0 ) {
              $this->id = mysql_insert_id();
              return $this->id;
        		}else{
              $this->error_number = 3;
              $this->error_description="Can't insert Item ";
              return false;
         	 		}
   				}
			elseif($this->id > 0 ) {
			$strSQL = "UPDATE item_categories SET name = '".addslashes(trim($this->name))."',";
			$strSQL .= "status_id = '".addslashes(trim($this->status_id))."',";
		 	$strSQL .= "parent_id = '".addslashes(trim($this->parent_id))."'";
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
		$strSQL = "SELECT id,name,status_id,parent_id FROM item_categories WHERE id = '".$this->id."'";
		$rsRES	= mysql_query($strSQL,$this->connection) or die(mysql_error().$strSQL);
		 if(mysql_num_rows($rsRES) > 0){
			$user 	= mysql_fetch_assoc($rsRES);
			$this->id 		= $user['id'];
			$this->name 	= $user['name'];
			$this->status_id= $user['status_id'];
			$this->parent_id= $user['parent_id'];
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
			$strSQL = "SELECT  id,name,status_id,parent_id FROM item_categories";
			$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
			if ( mysql_num_rows($rsRES) > 0 )
				 {
					while ( list ($id,$name,$status_id,$parent_id) = mysql_fetch_row($rsRES) ){
						$item_category[$i]["id"] =  $id;
						$item_category[$i]["name"] = $name;
						$item_category[$i]["status_id"] = $status_id;
						$item_category[$i]["parent_id"] = $parent_id;
						$i++;
           		 		}
            		return $item_category;
       			}else{
					$this->error_number = 4;
					$this->error_description="Can't list item";
					return false;
    				}
		}



		
function get_array()

	{
        	$item_category = array();
			$i=0;
			$strSQL = "SELECT  id,name FROM item_categories";
			$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
			if ( mysql_num_rows($rsRES) > 0 )
				 {
					while ( list ($id,$name) = mysql_fetch_row($rsRES) ){
						$item_category[$id] =  $name;

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

	
		
