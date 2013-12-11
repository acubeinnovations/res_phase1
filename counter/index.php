<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', '../');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/class/class_page/class_page.php');	// new Page Class

$page = new Page;

	$page->current_url = $current_url;	// current url for pages
	$page->title = "Acube MVC";	// page Title
	$page->page_name = 'index';		// page name for menu and other purpose
	$page->layout = 'counter_login.html';		// layout name


    $page->conf_list = array("conf.php");
    $page->menuconf_list = array("menu_conf.php");
	$page->connection_list = array("connection.php");

	$page->function_list = array("functions.php");
	$page->class_list = array("class_counter_session.php");

	$page->use_dynamic_content = true;
	$page->dynamic_content_list = array("index.php");



    $index=0;
    $content_list[$index]['file_name']='inc_menu.php';
    $content_list[$index]['var_name']='menu';
    $index++;

	$page->content_list = $content_list;

	$page->module_path = 'modules/counter/';
    $page->module = 'login';
	$page->display(); //completed page with dynamic cintent will be displayed
?>