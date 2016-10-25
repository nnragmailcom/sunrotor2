<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
if ( !$_REQUEST['is_ajax'] )
{
	redirect('/404.php', '404');
}
elseif ( $_REQUEST['is_ajax'] == 'Y' )
{
	$db = new core\sunrotor\classes\Database();
	$connection = $db->connect($dbConfig);

	$queryPage = $_REQUEST['page'];
	file_put_contents ($_SERVER["DOCUMENT_ROOT"] . "/draft.log", print_r($queryPage,1),FILE_APPEND);
	$className = "core\sunrotor\classes\\" . ucfirst($queryPage) . 'Page';
	if ( !class_exists($className) )
	{
		redirect('/404.php', '404');
	}
	$obView = new $className();
	$page = new core\sunrotor\classes\Page($obView);
	$page->generate($data);
}
