<?
class IndexPage extends Page
{
	public function __construct($obView)
	{
		echo 1;
		parent::__construct($obView);
	}
	public function show($arData)
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/templates/index.php';
	}
}
?>
