<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class CounterItem{

	var $connection="";
	var $id  =gINVALID;
	var $counter_id = gINVALID;
	var $kitchen_id = gINVALID;	
	var $item_id = gINVALID; 
	var $date ="";
	var $quantity = 0;

 function update()
		{
			if ( $this->id == "" || $this->id == gINVALID) {
			$strSQL = "INSERT INTO counter_items (item_id,counter_id,kitchen_id,date, quantity) VALUES ('";
			$strSQL .= addslashes(trim($this->item_id)) ."','";
			$strSQL .= addslashes(trim($this->counter_id)) . "','";
			$strSQL .= addslashes(trim($this->kitchen_id)) . "','";
			$strSQL .= addslashes(trim($this->date)) . "','";
			$strSQL .= addslashes(trim($this->quantity)) . "')";
			$rsRES = mysql_query($strSQL,$this->connection) or die ( mysql_error() . $strSQL );

          if ( mysql_affected_rows($this->connection) > 0 ) {
              $this->id = mysql_insert_id();
              return $this->id;
        		}else{
              $this->error_number = 3;
              $this->error_description="Can't insert Counter Item ";
              return false;
                 		}
         	}
  	}


	
function get_item_quantity_today()
{

	$strSQL = "SELECT sum(quantity) as total_quantity FROM counter_items WHERE  DATE_FORMAT(date,'%Y-%m-%d') = '".date("Y-m-d")."' AND counter_id = '".$this->counter_id."'"." AND item_id = '".$this->item_id."'";
	$rsRES	= mysql_query($strSQL,$this->connection) or die(mysql_error().$strSQL);
	 if(mysql_num_rows($rsRES) > 0){
		$item 	= mysql_fetch_assoc($rsRES);
		if($item['total_quantity'] > 0) {
			$this->quantity = $item['total_quantity'];
		}else{
			$this->quantity = 0;
		}
		return true;
		}else{
		return false;
		}
	
	}	
	
	
	   
  }             

   
   
          
       
    