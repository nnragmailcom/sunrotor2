<?
namespace core\sunrotor\classes;
class AdminPage extends Page
{
	public function __construct()
	{}
	public function show($arData = [])
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/templates/admin.php';
	}
}
?>
