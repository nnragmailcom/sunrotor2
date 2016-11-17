<?
namespace core\sunrotor\classes;

class User extends Item
{

	public function __construct($dbConf)
	{
		$db = new Database();
		$this->connection = $db->connect($dbConf);

	}
	public function getByFilter($handler, $arData)
	{
		$obReader = new Reader($arData);
    return $data = $handler->setTableName("users")->query($obReader)->fetchAll();
	}

	public function Authorize($uid)
	{
		session_start();
		$_SESSION['sunrotor_uid'] = $uid;
	}

	public function logOut()
	{
		//session_abort();
		unset($_SESSION['sunrotor_uid']);
	}

	public function isAuthorized()
	{
		//session_start();
		$arUser = $this->getByFilter
		(
			$this->connection,
			[
				'filter'=>
				[
					'id'=>$_SESSION['sunrotor_uid'],
				],
			]
		);

		return ( is_array($arUser) && !empty($arUser) );
	}
}
?>
