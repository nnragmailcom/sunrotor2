<?
namespace sunrotor\classes;
class Page implements View
{
	public function __construct($obView)
	{
		$this->view = $obView;
		//return $this;
	}


	public function generate($data = [])
	{
		$this->view->show($data);
	}
}
?>
