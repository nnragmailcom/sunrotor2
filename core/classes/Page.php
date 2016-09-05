<?
class Page implements View
{
	public function __construct($obView)
	{
		$this->view = $obView;
	}


	public function generate($data = [])
	{
		$this->view->show($data);
	}
}
?>
