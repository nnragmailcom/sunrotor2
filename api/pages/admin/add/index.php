<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
if ( !$_REQUEST['is_ajax'] &&  $_POST['action'] != 'sendauthinfo')
{
	redirect('/404.php', '404');
}
elseif ( $_REQUEST['is_ajax'] == 'Y' || $_POST['action'] == 'sendauthinfo'  )
{

	$db = new core\sunrotor\classes\Database();
	$connection = $db->connect($dbConfig);
	$obUser = new core\sunrotor\classes\User($dbConfig);

	if ( $_POST['action'] && $_POST['action'] == 'sendauthinfo' )
	{
		/*echo '123';
		var_dump($_POST);
		die();*/
		$login = $_POST['login'];
		$pass = $_POST['password'];

		$arUser = $obUser->getByFilter
		(
			$obUser->connection,
			[
				'filter'=>
				[
					'login'=>$login,
				],
			]
		);


		$isPassCorrect = password_verify($pass,$arUser['0']['PASSWORD']);

		if ( $isPassCorrect )
		{
			$obUser->Authorize($arUser['0']['ID']);
			redirect('/inside/add/');
		}

	}
	elseif ( $obUser->isAuthorized() )
	{
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
	else
	{
		redirect("/auth/");
	}

}
