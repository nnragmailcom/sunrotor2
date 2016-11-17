<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
if ( !$_REQUEST['is_ajax'] &&  $_POST['action'] != 'sendauthinfo')
{
	redirect('/404.php', '404');
}
elseif ( $_REQUEST['is_ajax'] == 'Y' || $_POST['action'] == 'sendauthinfo'  )
{
	$dbConfig =
	[
	  'type' => 'mysql',
	  'name' => 'sunrotor',
	  'host' => 'localhost',
	  'user' => 'crs',
	  'password' => '@Center12Of12Cyclone12@',
	];

	$db = new core\sunrotor\classes\Database();
	$connection = $db->connect($dbConfig);
	$obUser = new core\sunrotor\classes\User($dbConfig);

	if ( $_POST['action'] && $_POST['action'] == 'sendauthinfo' )
	{
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
		$isPassCorrect = password_verify($pass,password_hash($arUser['0']['PASSWORD'],PASSWORD_DEFAULT));
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
