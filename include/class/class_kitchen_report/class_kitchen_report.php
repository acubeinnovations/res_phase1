<?php
/**
* 
*/
class KitchenReport
{
	var $connection="";
	var $kitchen_id =gINVALID;
	var $counter_id=gINVALID;
	var $item_id =gINVALID;
    var $bill_status_id=gINVALID;
	var $bill_date  ="";
	var $item_name="";
	

	var $error = false;
    var $error_number=gINVALID;
    var $error_description="";
    var $total_records='';


function datewise_sales_report($start_record = 0,$max_records = 25){
        $limited_data = array(); 
		$i=0;
		$str_condition = "";
    $strSQL="SELECT CI.item_id,I.name,sum(CI.quantity)AS counter_quantity,sum(BI.quantity)AS bill_quantity
    FROM counter_items CI
    INNER JOIN items I ON I.id= CI.item_id 
    LEFT JOIN bill_items BI ON CI.item_id=BI.item_id
    WHERE CI.counter_id='".$this->counter_id."' ";

    
    if($this->counter_id!=gINVALID){
    $strSQL .=" AND CI.counter_id='".$this->counter_id."'";
    }
 
     if ($this->date!='') { 
     $strSQL .= " AND  DATE_FORMAT(CI.date,'%d-%m-%Y')= '".addslashes(trim($this->date))."'";  
     }
	$strSQL .= "GROUP BY CI.item_id";	

		$strSQL_limit = sprintf("%s LIMIT %d, %d", $strSQL, $start_record, $max_records);
		$rsRES = mysql_query($strSQL_limit, $this->connection) or die(mysql_error(). $strSQL_limit);

        if ( mysql_num_rows($rsRES) > 0 ){

            //without limit  , result of that in $all_rs
            if (trim($this->total_records)!="" && $this->total_records > 0) {
            } else {
				
                $all_rs = mysql_query($strSQL, $this->connection) or die(mysql_error(). $strSQL_limit); 
                $this->total_records = mysql_num_rows($all_rs);
            }
			while ($row = mysql_fetch_assoc($rsRES) ){
		          $limited_data[$i]["counter_quantity"]=$row["counter_quantity"];
                   $limited_data[$i]["bill_quantity"]=$row["bill_quantity"];
		          $limited_data[$i]["name"]=$row["name"];
		    
				  $i++;
		    }
        	return $limited_data; 
        }
        else{
        	return false;
        }

	}
}
?>

