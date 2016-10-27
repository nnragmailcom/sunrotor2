<?
/*include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';
$curUrl = core\sunrotor\classes\Router::getUrl();
$page = core\sunrotor\classes\Router::getUrlPart($curUrl,  2);


$obUser = new core\sunrotor\classes\User($dbConfig);
$user = $_GET['u'];
$pass = $_GET['p'];
$arUser = $obUser->getByFilter
(
	$obUser->connection,
	[
		'filter'=>
		[
			'login'=>$user,
		],
	]
);

$isPassCorrect = password_verify($pass,$arUser['0']['PASSWORD']);

if ( $isPassCorrect )
{
	$obUser->Authorize($arUser['0']['ID']);
	redirect('/inside/add/?in=y');
}




echo "<pre>";
var_dump($arUser);
echo "</pre>";
die();*/
/*echo "Hello, i'm a service section guard";
echo "<pre>";
var_dump($curUrl);
var_dump($page);
echo "</pre>";*/
//include '../templates/header.php';?>
<?include $_SERVER['DOCUMENT_ROOT'] . '/core/includes/header.php';?>
<script>
$(function()
{
    $.ajax
	(
		{
			'url' : '/api/pages/admin/auth/',
			'type' : 'get',
			'data' :
			{
				'is_ajax' : 'Y',
				'page' : 'auth',
			},
			'dataType' : 'html',
			'success' : function (data)
			{
				$('div.container').html(data);

			},
			'error' : function()
			{
				console.log('ajax error');
			}
		}
	);
})

</script>
<?//include '../templates/footer.php'


?>
