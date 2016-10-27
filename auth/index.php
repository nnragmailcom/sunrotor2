<?
include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';

$curUrl = core\sunrotor\classes\Router::getUrl();
$page = core\sunrotor\classes\Router::getUrlPart($curUrl,  2);


$user = new core\sunrotor\classes\User();

$data = $user->GetByFilter
(
	$connection,
	[
		'filter'=>
		[
			'id'=>1
		]
	]
);

echo "<pre>";
var_dump($data);
echo "</pre>";


/*echo "Hello, i'm a service section guard";
echo "<pre>";
var_dump($curUrl);
var_dump($page);
echo "</pre>";*/
?>
