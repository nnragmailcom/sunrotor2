<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
if ( !$_REQUEST['is_ajax'] )
{
	redirect('/404.php', '404');
}
else
{
	if ( $_REQUEST['is_ajax'] == 'Y' )
	{

		$db = new core\sunrotor\classes\Database();
		$connection = $db->connect($dbConfig);
		$item = new core\sunrotor\classes\Item();;

		$data = $item->GetByFilter
		(
			$connection,
			[
				'filter'=>
				[

				]
			]
		);


		$queryPage = $_REQUEST['page'];

		$className = "core\sunrotor\classes\\" . ucfirst($queryPage) . 'Page';
		if ( !class_exists($className) )
		{
			redirect('/404.php', '404');
		}
		$obView = new $className();
		$page = new core\sunrotor\classes\Page($obView);
		$page->generate($data);

	}
}
?>
