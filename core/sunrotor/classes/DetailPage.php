<?
namespace core\sunrotor\classes;
class DetailPage extends Page
{
	public function __construct()
	{}
	public function show($arData)
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/templates/detail.php';
	}
}
?>
