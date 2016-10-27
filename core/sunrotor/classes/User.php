<?
namespace core\sunrotor\classes;

class User extends Item
{

	public function __construct()
	{
		$db = new core\sunrotor\classes\Database();
		$this->connection = $db->connect($dbConfig);

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

	public function logOut($uid)
	{
		session_close();
		unset($_SESSION['sunrotor_uid']);
	}

	public function isAuthorized($uid)
	{
		$arUser = $this->getByFilter
		(
			$this->connection,
			'filter'=>
			[
				'id'=>$uid
			]
		);

		return ( is_array($arUser) && !empty($arUser) );
	}
}
?>
