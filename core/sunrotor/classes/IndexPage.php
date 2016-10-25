<?
namespace core\sunrotor\classes;
class IndexPage extends Page
{
	public function __construct()
	{}
	public function show($arData)
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/templates/index.php';
	}
}
?>
