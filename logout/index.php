<?require_once dirname(__DIR__) . '/core/includes/header.php'?>
<?session_start()?>
<?$user = new core\sunrotor\classes\User([
	'type' => 'mysql',
	'name' => 'sunrotor',
	'host' => '127.0.0.1',
	'user' => 'root',
	'password' => ''
]);
$user->logOut();
redirect('/');
?>
