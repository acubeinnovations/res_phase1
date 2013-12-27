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
	var $bill_item_total_quantity=0;

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
	
	$available_quantity=0;
	
	$strSQL = "SELECT sum(quantity) as total_quantity FROM counter_items WHERE  DATE_FORMAT(date,'%Y-%m-%d') = '".date("Y-m-d")."' AND counter_id = '".$this->counter_id."'"." AND item_id = '".$this->item_id."'";
		echo $strSQL1 = "SELECT sum(quantity) as bill_item_total_quantity FROM bill_items WHERE  created= '".date("Y-m-d")."' AND counter_id = '".$this->counter_id."'"." AND item_id = '".$this->item_id. "' AND bill_item_status_id='".BILL_ITEM_STATUS_ACTIVE."'";
	//echo $strSQL;
	$rsRES	= mysql_query($strSQL,$this->connection) or die(mysql_error().$strSQL);
	$rsRES1	= mysql_query($strSQL1,$this->connection) or die(mysql_error().$strSQL1);
	 if(mysql_num_rows($rsRES) > 0){
		
			echo $this->quantity =mysql_result($rsRES,0,'total_quantity');
			echo $this->bill_item_total_quantity =mysql_result($rsRES1,0,'bill_item_total_quantity');
			$available_quantity=0;
			$available_quantity=($this->quantity)-($this->bill_item_total_quantity);
			return $available_quantity;
		}else{
			$this->quantity = 0;
			return false;
		}
		
		
	
	}	
	
	
	   
  }             

   
   
          
       
    
