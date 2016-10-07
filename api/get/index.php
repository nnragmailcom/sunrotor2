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

		$db = new Database();
		$connection = $db->connect($dbConfig);
		$item = new Item();

		$data = $item->GetByFilter
		(
			$connection,
			[
				'filter'=>
				[
					'logic'=>'or',
					'id'=>'2',
					'name'=>'supertest супертест'
				]
			]
		);


		$queryPage = $_REQUEST['page'];

		$className = ucfirst($queryPage) . 'Page';
		if ( !class_exists($className) )
		{
			redirect301('/404.php');
		}
		$obView = new $className();
		$page = new Page($obView);
		$page->generate($data);

	}
}
?>
