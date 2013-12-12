<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Bills {
    var $connection;
    var $id 			= gINVALID;
	var $bill_number		= "";
    var $bill_date		= "";
	var $payment_date		= "";
	var $booking_date		= "";
	var $counter_id		= "";
    var $tax 	= "";
    var $amount		= "";
    var $discount 	= "";
    var $bill_status_id		= "";
    var $payment_id			= "";
 	var $name			= "";
    
    var $address	= "";
    var $email	= "";
    var $phone="" ; 
	var $total_bills= "";
	var $total_bills_active= "";
	var $total_bills_cancelled= "";
	var $table_id= "";
	var $chair_number= "";
	var $created= "";
	var $updated= "";
	
	

    var $error 			= false;
    var $error_number	= gINVALID;
    var $error_description= "";
    //for pagination
    var $total_records	= "";


    function __construct()
    {

    }
function set_defaults(){
$this->amount=0;


}


    function update(){
        if ( $this->id == "" || $this->id == gINVALID) {
		
		
		
              $strSQL = "INSERT INTO bills (bill_number,bill_date,booking_date,payment_date,bill_status_id,amount,tax,discount,name,address,phone,email,counter_id,table_id,chair_number,created,updated) ";				
			 
              $strSQL .= "VALUES ('".addslashes(trim($this->bill_number))."','";
			  $strSQL .= addslashes(trim($this->bill_date))."','";
			  $strSQL .= addslashes(trim($this->booking_date))."','";
			  $strSQL .= addslashes(trim($this->payment_date))."','";
			  $strSQL .= addslashes(trim($this->bill_status_id))."','";
			  $strSQL .= addslashes(trim($this->amount))."','";
              $strSQL .= addslashes(trim($this->tax))."','";
			  $strSQL .= addslashes(trim($this->discount))."','";
              $strSQL .= addslashes(trim($this->name))."','";
              $strSQL .= addslashes(trim($this->address))."','";
              $strSQL .= addslashes(trim($this->phone))."','";
              $strSQL .= addslashes(trim($this->email))."','"; 
              $strSQL .= addslashes(trim($this->counter_id))."','";
			  $strSQL .= addslashes(trim($this->table_id))."','";
			  $strSQL .= addslashes(trim($this->chair_number))."','";
			  $strSQL .= addslashes(trim($this->created))."','";
              $strSQL .= addslashes(trim($this->updated))."')";
		      $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
              if ( mysql_affected_rows($this->connection) > 0 ){
                    $this->id = mysql_insert_id();
					return true;
              }
              else{
                $this->error_description = "Bill adding failed.Please Try Again.";
                return false;
              }

        }elseif($this->id > 0 ) {
        $strSQL = "UPDATE bills SET ";
	   
		
		if($this->bill_date!=''){
            $strSQL .= "bill_date = '".addslashes(trim($this->bill_date))."',";
	     }
		if($this->payment_date!=''){
	    	$strSQL .= "payment_date = '".addslashes(trim($this->payment_date))."',";
		}
		if($this->bill_status_id!=''){
	    $strSQL .= "bill_status_id = '".addslashes(trim($this->bill_status_id))."',";
	    }

		if($this->name!=''){
            $strSQL .= "name = '".addslashes(trim($this->name))."',";
		}
		if($this->discount!=''){
            $strSQL .= "discount = '".addslashes(trim($this->discount))."',";
		}
		
		if($this->tax!='' && $this->tax!=gINVALID ){
            $strSQL .= "tax = '".addslashes(trim($this->tax))."',";
		}
		
		 if($this->amount!=''){
	    $strSQL .= "amount = '".addslashes(trim($this->amount))."'";
	    }	
					
	    $strSQL .= " WHERE id = ".$this->id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) >= 0 ) {
		$this->error_description = "Updated data Successfuly";                    
		return true;
            }
        else{
             $this->error_description = "Update data Failed";
             return false;
            }
        }
        

    }




    function exist(){
        $strSQL = "SELECT id FROM bills WHERE id = '".$this->id."'"; 
  		$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
		$this->id = mysql_result($rsRES,0,'id');
            return true;
        }
        else{
            return false;
        }
    }



    function get_detail(){
		
        $strSQL = "SELECT * FROM bills WHERE id = '".$this->id."'";//echo $strSQL;exit();
		$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
                $this->id = mysql_result($rsRES,0,'id');
				$this->booking_date = mysql_result($rsRES,0,'booking_date');
				$this->bill_date = mysql_result($rsRES,0,'bill_date');
				$this->payment_date = mysql_result($rsRES,0,'payment_date');
                $this->name = mysql_result($rsRES,0,'name');
				$this->email = mysql_result($rsRES,0,'email');
				$this->phone = mysql_result($rsRES,0,'phone');
				$this->address = mysql_result($rsRES,0,'address');
                $this->amount = mysql_result($rsRES,0,'amount');
				$this->discount = mysql_result($rsRES,0,'discount');
                $this->tax = mysql_result($rsRES,0,'tax');
                $this->counter_id= mysql_result($rsRES,0,'counter_id');
				$this->table_id= mysql_result($rsRES,0,'table_id');
				$this->chair_number= mysql_result($rsRES,0,'chair_number');
				$this->created= mysql_result($rsRES,0,'created');
				$this->bill_status_id= mysql_result($rsRES,0,'bill_status_id');
                $this->updated= mysql_result($rsRES,0,'updated');
                
               
                return true;
        }
        else{
            return false;
        }
    }


 
    function get_list_array_bylimit($start_record = 0,$max_records = 25){
        $limited_data = array(); 
		$i=0;
		$str_condition = "";
        $strSQL = "SELECT id,booking_date,bill_date,payment_date,bill_status_id,name,amount FROM bills WHERE 1";
		if($this->id!='' && $this->id!=gINVALID){
           $strSQL .= " AND id = '".addslashes(trim($this->id))."'";
      	 }
        if ($this->booking_date!='') { 
       	$strSQL .= " AND booking_date LIKE '%".addslashes(trim($this->booking_date))."%'";  
        }
		 if ($this->bill_date!='') { 
       	$strSQL .= " AND bill_date LIKE '%".addslashes(trim($this->bill_date))."%'";  
        }
		 if ($this->payment_date!='') { 
       	$strSQL .= " AND payment_date LIKE '%".addslashes(trim($this->payment_date))."%'";  
        }
		
	 if ($this->bill_status_id!='' && $this->bill_status_id!=gINVALID) { 
        $strSQL .= " AND bill_status_id = '".addslashes(trim($this->bill_status_id))."'";  
        }
		
         $strSQL .= " ORDER BY id";
		
	
		$strSQL_limit = sprintf("%s LIMIT %d, %d", $strSQL, $start_record, $max_records);
		$rsRES = mysql_query($strSQL_limit, $this->connection) or die(mysql_error(). $strSQL_limit);

        if ( mysql_num_rows($rsRES) > 0 ){

            //without limit  , result of that in $all_rs
            if (trim($this->total_records)!="" && $this->total_records > 0) {
            } else {
				
                $all_rs = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL_limit); 
                $this->total_records = mysql_num_rows($all_rs);
            }
			while (list ($id,$date,$bill_status_id,$payment_id,$agent_id,$name,$amount,$commision) = mysql_fetch_row($rsRES) ){
		          $limited_data[$i]["id"] = $id;
		          $limited_data[$i]["bill_date"] = $date;
				  $limited_data[$i]["booking_date"] = $date;
				  $limited_data[$i]["payment_date"] = $date;
		          $limited_data[$i]["bill_status_id"] = $bill_status_id;
		          $limited_data[$i]["name"]=$name;
		          $limited_data[$i]["amount"]=$amount;
				  $i++;
		    }
        	return $limited_data;
        }
        else{
        	return false;
        }
    }



function delete(){
    if($this->id > 0 ) {
        $strSQL = " DELETE FROM bills WHERE id = '".$this->id."'";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
        }
        else{
            $this->error_number = 6;
            $this->error_description="Can't delete this User";
            return  false;
        }
    }
}
function get_counts(){
$strSQL = "SELECT count(id) as total_bills from bills";
$rsRES = mysql_query($strSQL, $this->connection);
if ( mysql_num_rows($rsRES) > 0 ){
$this->total_bills=mysql_result($rsRES,0,'total_bills');
}
$strSQL = "SELECT count(id) as total_bills_active from bills WHERE bill_status_id=".STATUS_ACTIVE;
$rsRES = mysql_query($strSQL, $this->connection);
if ( mysql_num_rows($rsRES) > 0 ){
$this->total_bills_active=mysql_result($rsRES,0,'total_bills_active');
}
$strSQL = "SELECT count(id) as total_bills_cancelled from bills WHERE status_id=".STATUS_INACTIVE;
$rsRES = mysql_query($strSQL, $this->connection);
if ( mysql_num_rows($rsRES) > 0 ){
$this->total_bills_cancelled=mysql_result($rsRES,0,'total_bills_inactive');
}

}

function get_array_statuses()
    {
        $bill_statuses = array();
		
        $strSQL = "SELECT  id,name FROM bill_statuses";
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
            while ( list($id,$name) = mysql_fetch_row($rsRES) ){
				$bill_statuses[$id] = $name;
               
            }
            return $bill_statuses;
        }else{
        $this->error_number = 4;
        $this->error_description="Can't list bill_statuses";
        return false;
        }
	}

function get_last_bill_number()
    {
        $last_bill_number="";		
        $strSQL = "SELECT  last_bill_number FROM counters WHERE id=".$this->counter_id;
        $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
        if ( mysql_num_rows($rsRES) > 0 ){
         $last_bill_number= mysql_result($rsRES,0,'last_bill_number');
               
          
            return $last_bill_number;
        }else{
        $this->error_number = 4;
        $this->error_description="Can't list bill_statuses";
        return false;
        }
	}


}
?>
