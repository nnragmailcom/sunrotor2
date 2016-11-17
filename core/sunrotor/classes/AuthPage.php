<?
namespace core\sunrotor\classes;
class AuthPage extends Page
{
	public function __construct()
	{}
	public function show($arData = [])
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/templates/login.php';
	}
}
?>
