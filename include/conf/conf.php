<?php
//User Types
define("ADMINISTRATOR", 999);


//User Status
define("USERSTATUS_ACTIVE", 1);
define("USERSTATUS_INACTIVE", 2);
define("USERSTATUS_WAITING_EMAIL_ACTIVATION", 3);


// Status
define("STATUS_ACTIVE", 1);
define("STATUS_INACTIVE", 2);


GLOBAL $g_msg_unauthorized_request;
$g_msg_unauthorized_request = "<strong>Unauthorized Page Request</strong><br/> <br/> You are not authorized to access this page. This attempt will be reported to the system Administrator. ";

GLOBAL $g_msg_unauthorized_request_redirect_page;
$g_msg_unauthorized_request_redirect_page = "index.php";

GLOBAL $g_obj_select_default_text;
$g_obj_select_default_text = "Choose from list..";


//Email 
define("EMAIL_NO_REPLY", "noreply@acubemvc.local");
define("EMAIL_INFO", "noreply@acubemvc.local");
define("EMAIL_SUPPORT", "noreply@acubemvc.local");


define("WEB_URL", "http://www.acubemvc.local");
define("ADMIN_URL", "http://www.acubemvc.local/admin");
define("WEB_NAME", "acubemvc.local");
define("ORG_NAME", "acubemvc");
?>
