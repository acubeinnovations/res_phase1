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
	var $chkmaster="";
	var $error = false;
    var $error_number=gINVALID;
    var $error_description=""; 


 function update()
		{	
			if ( $this->id == "" || $this->id == gINVALID) {
			$strSQL = "INSERT INTO items (name,item_category_id,rate,tax,status_id,from_master_kitchen) VALUES ('";
			$strSQL .= addslashes(trim($this->name)) ."','";
			$strSQL .= addslashes(trim($this->item_category_id)) . "','";
			$strSQL .= addslashes(trim($this->rate)) . "','";
			$strSQL .= addslashes(trim($this->tax)) . "','";
			$strSQL .= addslashes(trim($this->status_id)) . "','";
			$strSQL .= addslashes(trim($this->chkmaster)) . "')";
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
			$strSQL = "UPDATE items SET name = '".addslashes(trim($this->name))."',";
			$strSQL .= "item_category_id = '".addslashes(trim($this->item_category_id))."',";
			$strSQL .= "rate = '".addslashes(trim($this->rate))."',";
			$strSQL .= "tax = '".addslashes(trim($this->tax))."',";
		 	$strSQL .= "status_id = '".addslashes(trim($this->status_id))."'";
		 	$strSQL .= "chkmaster = '".addslashes(trim($this->chkmaster))."'";
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

function get_details()
{
	if($this->id >0){
		$strSQL = "SELECT id,name,item_category_id,rate,tax,status_id,from_master_kitchen FROM items WHERE id = '".$this->id."'";
		$rsRES	= mysql_query($strSQL,$this->connection) or die(mysql_error().$strSQL);
		 if(mysql_num_rows($rsRES) > 0){
			$user 	= mysql_fetch_assoc($rsRES);
			$this->id 		= $user['id'];
			$this->name 	= $user['name'];
			$this->item_category_id= $user['item_category_id'];
			$this->rate= $user['rate'];
			$this->tax= $user['tax'];
			$this->status_id= $user['status_id'];
			$this->from_master_kitchen= $user['from_master_kitchen'];
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
		$items = array();$i=0;
		$strSQL = "SELECT  id,name,item_category_id,rate,tax,status_id,from_master_kitchen FROM items";
		$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
		if ( mysql_num_rows($rsRES) > 0 )
					{
					while ( list ($id,$name,$item_category_id,$rate,$tax,$status_id,$chkmaster) = mysql_fetch_row($rsRES) ){
						$items[$i]["id"] =  $id;
						$items[$i]["name"] = $name;
						$items[$i]["item_category_id"] = $item_category_id;
						$items[$i]["rate"] = $rate;
						$items[$i]["tax"] = $tax;
						$items[$i]["status_id"] = $status_id;
						$items[$i]["chkmaster"] = $chkmaster;
						$i++;
           		 	}
            return $items;
       		}else{
			$this->error_number = 4;
			$this->error_description="Can't list item";
			return false;
    			}
		}




function get_array()

		{
        	$items = array();
			$i=0;
			$strSQL = "SELECT  id,name,item_category_id,rate,tax,from_master_kitchen FROM items";
			$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
			if ( mysql_num_rows($rsRES) > 0 )
				 {
					while ( list ($id,$name,$item_category_id,$rate,$tax) = mysql_fetch_row($rsRES) ){
						$items[$id] =  $name;
						//$items[$name] =  $name;
						$items[$item_category_id] =$item_category_id;
						$items[$rate] =  $rate;
						$items[$tax] =  $tax;

						$i++;
           		 	}
            		return $items;
       				}else{
					$this->error_number = 4;
					$this->error_description="Can't list item";
					return false;
    				}
			}	



function get_items_by_category(){
		$items = array();
			$i=0;
			$strSQL = "SELECT  id,name,item_category_id,rate,tax ,from_master_kitchen FROM items WHERE item_category_id=".$this->item_category_id;
			$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
			if ( mysql_num_rows($rsRES) > 0 )
				 {
					while ( list ($id,$name,$item_category_id,$rate,$tax) = mysql_fetch_row($rsRES) ){
						$items[$i]['id'] =  $id;
						$items[$i]['name'] =  $name;
						$items[$i]['item_category_id'] =$item_category_id;
						$items[$i]['rate'] =  $rate;
						$items[$i]['tax'] =  $tax;
						$items[$i]['from_master_kitchen'] =  $chkmaster;

						$i++;
           		 	}
            		return $items;
       				}else{
					$this->error_number = 4;
					$this->error_description="Can't list item";
					return false;
    				}
			}	

}
?>



