<?php
// prevent execution of this page by direct call by browser
if ( !defined('CHECK_INCLUDED') ){
    exit();
}


class KitchenSession{

var $connection;
var $id=gInvalid;
var $username;
var $password;


var $error= false;
var $error_number=gInvalid;
var $error_description="";


}
?>