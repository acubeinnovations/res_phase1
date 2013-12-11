<?php session_start();
define('CHECK_INCLUDED', true);
define('ROOT_PATH', './');
$current_url = $_SERVER['PHP_SELF'];

require(ROOT_PATH.'include/class/class_page/class_page.php');	// new Page Class

$page = new Page;

	$page->current_url = $current_url;	// current url for pages
	$page->title = "Acube MVC";	// page Title
	$page->page_name = 'index';		// page name for menu and other purpose
	$page->layout = 'restaurant.html';		// layout name


    $page->conf_list = array("conf.php");
    $page->menuconf_list = array("menu_conf.php");
	$page->connection_list = array("connection.php");

	$page->function_list = array("functions.php");




    $index=0;
    $content_list[$index]['file_name']='inc_right_menu.php';
    $content_list[$index]['var_name']='right_menu';
    $index++;

    $content_list[$index]['file_name']='inc_index.php';
    $content_list[$index]['var_name']='content';
    $index++;

	$page->content_list = $content_list;


	$page->display(); //completed page with dynamic cintent will be displayed
?>
