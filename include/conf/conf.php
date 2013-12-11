<?php
//User Types
define("ADMINISTRATOR", 999);
define("COUNTER", 100);
define("KITCHEN", 200);
define("MASTER_KITCHEN", 300);

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
define("EMAIL_NO_REPLY", "noreply@restaurant.local");
define("EMAIL_INFO", "noreply@restaurant.local");
define("EMAIL_SUPPORT", "noreply@restaurant.local");


define("WEB_URL", "http://www.restaurant.local");
define("ADMIN_URL", "http://www.restaurant.local/admin");
define("COUNTER_URL", "http://www.restaurant.local/counter");
define("KITCHEN_URL", "http://www.restaurant.local/kitchen");
define("WEB_NAME", "restaurant.local");
define("ORG_NAME", "restaurant");
?>
