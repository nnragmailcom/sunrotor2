<?
class Database
{
    public function connect($connectParams)
    {
        $dbType = $connectParams['type'] ?: 'mysql';
        $dbName = $connectParams['name'] ?: '';
        $dbHost = $connectParams['host'] ?: '127.0.0.1';
        $dbUser = $connectParams['user'] ?: '';
        $dbPass = $connectParams['password'] ?: '';

        try
        {
            $this->dbHandler = new PDO( $dbType . ':dbname=' . $dbName . ';host=' . $dbHost, $dbUser, $dbPass );
        }
        catch (PDOException $e)
        {
            file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log',$e->getMessage() . "\n",FILE_APPEND );
        }

        return $this;
    }
    public function query($obCrud)
    {
        try
        {
            $obStatement = $this->dbHandler->prepare($obCrud->preparedData['sql']);
            $obStatement->execute($obCrud->preparedData['pplaceholders']);
            return $obStatement;
        }
        catch (PDOException $e)
        {
            file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log',$e->getMessage() . "\n",FILE_APPEND );
        }
        return false;
    }
}
?>
