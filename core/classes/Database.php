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
            echo '<br />' . '=>[' . __FILE__ . ']' . 'connected to ' . $dbName . '<br />';
        }
        catch (PDOException $e)
        {
            file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/errors.log',$e->getMessage() . "\n",FILE_APPEND );
        }

        return $this;
    }
}
?>
