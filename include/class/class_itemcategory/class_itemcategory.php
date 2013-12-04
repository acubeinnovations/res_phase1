<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Item{
	var $connection;
	var  $id=gINVALID;
	var  $name="";
	var  $status_id="";
	
	var $error = false;
    var $error_number=gINVALID;
    var $error_description="";
	

	
	function update()
		{
			
		 
			if ( $this->id == "" || $this->id == gINVALID) {
			$strSQL = "INSERT INTO item_categories (name,status_id) VALUES ('";
			$strSQL .= addslashes(trim($this->name)) ."','";
			$strSQL .= addslashes(trim($this->status_id)) . "')";
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
			$strSQL .= "status_id = ".addslashes(trim($this->status_id))."";
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
		        	if($this->id >0)
					{
							$strSQL = "SELECT id,name,status_id FROM item_categories WHERE id = '".$this->id."'";
							$rsRES	= mysql_query($strSQL,$this->connection) or die(mysql_error().$strSQL);
		
						 if(mysql_num_rows($rsRES) > 0)
							{
							$user 	= mysql_fetch_assoc($rsRES);
							$this->id 		= $user['id'];
							$this->name 	= $user['name'];
							$this->status_id	= $user['status_id'];
							return true;
							}
							 else{
								return false;
								}
									
					}
			   }

			
			function get_all()
			{
				$strSQL = "SELECT id,name FROM item_categories ORDER BY name ASC";
				//$strSQL_limit = sprintf("%s LIMIT %d, %d", $strSQL, $start_record, $max_record);
				$rsRES	= mysql_query($strSQL ,$this->connection) or die(mysql_error().$strSQL );
			if(mysql_num_rows($rsRES) > 0)
				{
				$limit_data=array();$i=0;
				$numSQL = "SELECT COUNT(*) AS count FROM item_categories";
				$resNUM = mysql_query($numSQL,$this->connection) or die(mysql_error().$numSQL);
				$rowNUM = mysql_fetch_assoc($resNUM);
				$this->total_records = $rowNUM['count'];
			
			while($row = mysql_fetch_assoc($rsRES))
				{
				$limit_data[$i]['id'] 	= $row['id'];
				$limit_data[$i]['name'] 	= $row['name'];
				//$limit_data[$i]['status_id'] 	= $row['status_id'];
				$i++;
				}
				
				return $limit_data;
			
				}else{
				return false;
					}		
		}
		
		
		
function get_list_array()

	{
        	$cities = array();$i=0;
			$strSQL = "SELECT id AS id,language_name,publish FROM languages";
			$rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
			if ( mysql_num_rows($rsRES) > 0 )
				{
					while ( list ($id,$language,$publish) = mysql_fetch_row($rsRES) ){
						$languages[$i]["id"] =  $id;
						$languages[$i]["language"] = $language;
						$languages[$i]["publish"] = $publish;
						if ( $languages[$i]["publish"] == CONF_NOT_PUBLISH )
							$languages[$i]["publish_status"] = "No";
					else
						$languages[$i]["publish_status"] = "Yes";
					$i++;
           		 	}
            		return $languages;
       			 }else{
					$this->error_number = 4;
					$this->error_description="Can't list languages";
					return false;
    				}
}
		
}
