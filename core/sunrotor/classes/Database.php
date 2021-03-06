<?
namespace core\sunrotor\classes;
class Database
{
    public function connect($connectParams)
    {

        $dbType = $connectParams['type'] ?: 'mysql';
        $dbName = $connectParams['name'] ?: '';
        $dbHost = $connectParams['host'] ?: '127.0.0.1';
        $dbUser = $connectParams['user'] ?: 'crs';
        $dbPass = $connectParams['password'] ?: '@Center12Of12Cyclone12@';

        try
        {
            $this->dbHandler = new \PDO( $dbType . ':dbname=' . $dbName . ';host=' . $dbHost, $dbUser, $dbPass );
        }
        catch (\PDOException $e)
        {
          echo __CLASS__;
          die ($e->getMessage());
          file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log',$e->getMessage() . "\n",FILE_APPEND );
        }
        return $this;
    }
	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}
  public function query($obCrud)
  {
      try
      {
    			$sql = str_replace("#TABLE#",$this->tableName,$obCrud->preparedData['sql']);
    			$obStatement = $this->dbHandler->prepare($sql);
    			$obStatement->execute($obCrud->preparedData['pplaceholders']);
          return $obStatement;
      }
      catch (\PDOException $e)
      {
          echo 2;
          die ($e->getMessage());
          file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log',$e->getMessage() . "\n",FILE_APPEND );
      }
      return false;
  }
}
?>
