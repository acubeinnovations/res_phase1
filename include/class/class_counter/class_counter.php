<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}

class Counter{

	var $connection="";
	var $id  =gINVALID;
	var $username;
  var $password;
  var $emailid;
  var $registrationdate;
  var $lastlogin;
  var $securityquestion_id = gINVALID;
  var $answer = "";

  var $created = "";
  var $updated = "";
  var $record_user_id= gINVALID;

  var $error = false;
  var $error_number=gINVALID;
   var $error_description="";
    //for pagination
   var $total_records = "";


 function update(){

       if ( $this->id == "" || $this->id == gINVALID) {
              $strSQL = "INSERT INTO counters(username,password,name,registrationdate,securityquestion_id,answer,created) ";
              $strSQL .= "VALUES ('".addslashes(trim($this->username))."','";
              $strSQL .= md5(addslashes(trim($this->password)))."','";
              $strSQL .= addslashes(trim($this->name))."',";
              $strSQL .= "now(),";
              $strSQL .= addslashes(trim($this->securityquestion_id)).",'";
              $strSQL .= addslashes(trim($this->answer))."',";
              $strSQL .= "now())";

              $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
              if ( mysql_affected_rows($this->connection) > 0 ){
                    $this->id = mysql_insert_id();;
                    return true;
                }
              else{
                $this->error_description = "Insert data Failed";
                return false;
              	}
		    }elseif($this->id > 0 ) {
        	
            $strSQL = "UPDATE counters SET ";
            $strSQL .= "name = '".addslashes(trim($this->name))."',";
            $strSQL .= "securityquestion_id = '".addslashes(trim($this->securityquestion_id))."',";
            $strSQL .= "answer = '".addslashes(trim($this->answer))."',";
            $strSQL .= "updated = now(), ";
			       $strSQL .= "registrationdate = '".addslashes(trim($this->registrationdate))."'";
            $strSQL .= " WHERE id = ".$this->id;
            $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
            if ( mysql_affected_rows($this->connection) >= 0 ) {
                    return true;
            }else{
              $this->error_description = "Update data Failed";
              return false;
                }
            
        }
}


function change_password($newpasswd,$oldpasswd){
      $strSQL = "UPDATE counters SET ";
      $strSQL .= "password = '" .mysql_real_escape_string($newpasswd). "' ";
      $strSQL .= "WHERE id = '" . $this->id . "' AND password = '".mysql_real_escape_string($oldpasswd)."'";
      $rsRES = mysql_query($strSQL,$this->connection) or die(mysql_error(). $strSQL );
      if ( mysql_affected_rows($this->connection) > 0 ) {
            return true;
             }else{
                return false;
                $this->error_description = "Incorrect password";       
                 }    
                    
    	}

}