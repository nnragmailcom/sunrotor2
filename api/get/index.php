<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
if ( !$_POST['is_ajax'] )
{
	redirect301('/404.php');
}
else
{
	if ( $_POST['is_ajax'] == 'Y' )
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
					'logic'=>'and',
					'id'=>'2',
					'name'=>'supertest супертест'
				]
			]
		);


		$queryPage = $_POST['page'];

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
